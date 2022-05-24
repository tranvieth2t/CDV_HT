<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Enums\NewsVerify;
use App\Interfaces\NewsRepository;
use App\Services\BaseService;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class NewsServices extends BaseService
{
    protected $repository;
    protected $s3Services;

    public function __construct(NewsRepository $repository, S3Service $s3Service)
    {
        $this->repository = $repository;
        $this->s3Services = $s3Service;
    }

    public function getListNews($perPage = null, $condition = [])
    {
        return $this->repository->getListNews($perPage, $condition);
    }

    public function getListNewsNotVerify($perPage = 10, $condition = [])
    {
        return $this->repository
            ->where('verify', '!=' ,NewsVerify::VERIFY)
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function getListNewHot($perPage = null, $condition = [])
    {
        return $this->repository->getListNewHot($perPage, $condition);
    }

    public function createNews($request)
    {
        $params = $request->all();

        $forder = "news";
        if ($request->hasFile('thumbnail')) {
            $dataImage = [
                'imageNew' => $request->thumbnail,
                'folder' => $forder,
                'community' => $request->community_id ??  ''
            ];
            $imageUrl = $this->s3Services->uploadImage($dataImage);
        }
        preg_match_all('/src="data:image[^ >]+"/i', $params['content'], $result);
        foreach ($result[0] as $image) {
            $img = getBase64ContentFromImageTag($image);
            $imageS3 = $this->s3Services->storeBase64ImageToS3(
                $img,
                $request->community_id ?? '',
                '/' . $forder . '/'
            );
            if ($imageS3) {
                $params['content'] = str_replace($image, 'src="' . $imageS3 . '"', $params['content']);
            } else {
                throw new ValidationException('Image base 64 error');
            }
        }

        $params['thumbnail'] = $imageUrl ?? config('constants.news_thumbnail_default');
        $params['created_by'] = Auth::guard('admin')->user()->id;
        return $this->repository->create($params);
    }

    public function updateNews($request, $id)
    {
        try {
            $news = $this->repository->find($id);
            DB::beginTransaction();
            $data = $request->all();
            $listImageS3New = [];
            $forder = "news";
            preg_match_all('/src="data:image[^ >]+"/i', $data['content'], $result);
            foreach ($result[0] as $image) {
                if (!strpos($image, config('filesystems.disks.s3.url'))) {
                    $img = getBase64ContentFromImageTag($image);
                    $imageS3 = $this->s3Services->storeBase64ImageToS3(
                        $img,
                        $news->community_id,
                        '/' . $forder . '/'
                    );
                    if ($imageS3) {
                        $data['content'] = str_replace($image, 'src="' . $imageS3 . '"', $data['content']);
                    } else {
                        throw new ValidationException('Image base 64 error');
                    }
                } else {
                    $img = getImageUrlFromImageTag($image);
                    $listImageS3New[] = $img;
                }
            }
            //Delete unused images
            $oldImage = $this->getListS3ImageUrlById($id);
            if (!empty($oldImage)) {
                foreach ($oldImage as $image) {
                    if (!in_array($image, $listImageS3New)) {
                        $this->s3Services->isDestroy($image);
                    }
                }
            }


            if ($request->hasFile('thumbnail')) {
                $oldImageThumb = config('filesystems.disks.s3.url')."/".$news->thumbnail;
                $forder = "news";
                $dataImage = [
                    'imageNew' => $request->thumbnail,
                    'community' => $request->community_id,
                    'folder' => $forder
                ];
                $imageUrl = $this->s3Services->uploadImage($dataImage);
                $data['thumbnail'] = $imageUrl ?? config('constants.news_thumbnail_default');
                if (!$news->is_thumbnail_default) {
                    $this->s3Services->isDestroy($oldImageThumb);
                }
            }
            $this->repository->update($data, $id);
            session()->flash('success', trans('message.admin.news.updatedSuccess'));
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->writeExceptionLog('Update news', $exception);
            return abort('404');
        }
    }

    public function getListS3ImageUrlById($newId)
    {
        $result = [];
        $news = $this->repository->find($newId);
        preg_match_all('/src[^ >]+"/i', $news->content, $images);
        foreach ($images[0] as $image) {
            if (strpos($image, config('filesystems.disks.s3.url'))) {
                $imgUrl = getImageUrlFromImageTag($image);
                $result[] = $imgUrl;
            }
        }
        return $result;
    }

    public function delete($id)
    {
        $news = $this->repository->find($id);
        preg_match_all('/src[^ >]+"/i', $news->content, $result);
        foreach ($result[0] as $image) {
            $imgUrl = getImageUrlFromImageTag($image);
            $this->s3Services->isDestroy($imgUrl);
        }
        if (!$news->is_thumbnail_default) {
            $oldImageThumb = config('filesystems.disks.s3.url')."/".$news->thumbnail;
            $this->s3Services->isDestroy($oldImageThumb);
        }

        $news->delete();
        session()->flash('success', trans('message.admin.news.deletedSuccess'));
        return response()->json([
            'code' => 200,
            'data' => trans('message.admin.news.deletedSuccess'),
        ]);
    }
}
