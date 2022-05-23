<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Interfaces\CoupleRepository;
use App\Services\BaseService;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class CoupleServices extends BaseService
{
    protected $repository;
    protected $s3Services;

    public function __construct(CoupleRepository $repository, S3Service $s3Service)
    {
        $this->repository = $repository;
        $this->s3Services = $s3Service;
    }

    public function getListCouple($perPage = null, $condition = [])
    {
        return $this->repository->orderByDesc('created_at')
            ->with(['communityFemale', 'communityMale', 'admin'])
            ->paginate(10);
    }


    public function createCouple($request)
    {
        $params = $request->all();
        $forder = "couple";
        if ($request->hasFile('thumbnail')) {
            $dataImage = [
                'imageNew' => $request->thumbnail,
                'folder' => $forder,
                'community' => $request->community_id ?? ''
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
        $params['community_male_id'] = $params['community_male_id'] != "none" ? $params['community_male_id'] : null;
        $params['community_female_id'] = $params['community_female_id'] != "none" ? $params['community_female_id'] : null;
        $params['thumbnail'] = $imageUrl ?? config('constants.couple_thumbnail_default');
        $params['created_by'] = Auth::guard('admin')->user()->id;
        session()->flash('success', trans('message.admin.couple.updatedSuccess'));
        return $this->repository->create($params);
    }

    public function update($request, $id)
    {
        try {
            $couple = $this->repository->find($id);
            DB::beginTransaction();
            $data = $request->all();
            $listImageS3New = [];
            $forder = "couple";
            preg_match_all('/src="data:image[^ >]+"/i', $data['content'], $result);
            foreach ($result[0] as $image) {
                if (!strpos($image, config('filesystems.disks.s3.url'))) {
                    $img = getBase64ContentFromImageTag($image);
                    $imageS3 = $this->s3Services->storeBase64ImageToS3(
                        $img,
                        $couple->community_id,
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
                $oldImageThumb = config('filesystems.disks.s3.url') . "/" . $couple->thumbnail;
                $forder = "couple";
                $dataImage = [
                    'imageNew' => $request->thumbnail,
                    'community' => $request->community_id,
                    'folder' => $forder
                ];
                $imageUrl = $this->s3Services->uploadImage($dataImage);
                $data['thumbnail'] = $imageUrl ?? config('constants.couple_thumbnail_default');
                if (!$couple->is_thumbnail_default) {
                    $this->s3Services->isDestroy($oldImageThumb);
                }
            }
            $data['community_male_id'] = $data['community_male_id'] != "none" ? $data['community_male_id'] : null;
            $data['community_female_id'] = $data['community_female_id'] != "none" ? $data['community_female_id'] : null;
            $this->repository->update($data, $id);
            session()->flash('success', trans('message.admin.couple.updatedSuccess'));
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->writeExceptionLog('Update couple', $exception);
            return abort('404');
        }
    }

    public function getListS3ImageUrlById($newId)
    {
        $result = [];
        $couple = $this->repository->find($newId);
        preg_match_all('/src[^ >]+"/i', $couple->content, $images);
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
        $couple = $this->repository->find($id);
        preg_match_all('/src[^ >]+"/i', $couple->content, $result);
        foreach ($result[0] as $image) {
            $imgUrl = getImageUrlFromImageTag($image);
            $this->s3Services->isDestroy($imgUrl);
        }
        $oldImageThumb = config('filesystems.disks.s3.url') . "/" . $couple->thumbnail;
        if (!$couple->is_thumbnail_default) {
            $this->s3Services->isDestroy($oldImageThumb);
        }
        $couple->delete();
        session()->flash('success', trans('message.admin.couple.deletedSuccess'));
        return response()->json([
            'code' => 200,
            'data' => trans('message.admin.couple.deletedSuccess'),
        ]);
    }
}
