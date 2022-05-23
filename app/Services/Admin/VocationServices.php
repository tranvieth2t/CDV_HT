<?php

namespace App\Services\Admin;

use App\Interfaces\VocationRepository;
use App\Services\BaseService;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VocationServices extends BaseService
{
    protected $repository;
    protected $s3Services;

    public function __construct(VocationRepository $repository, S3Service $s3Service)
    {
        $this->repository = $repository;
        $this->s3Services = $s3Service;
    }

    public function getListVocation($perPage = null, $condition = [])
    {
        return $this->repository->getListVocation($perPage, $condition);
    }


    public function createVocation($request)
    {
        $params = $request->all();

        $forder = "vocation";
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

        $params['thumbnail'] = $imageUrl ?? config('constants.vocation_thumbnail_default');
        $params['created_by'] = Auth::guard('admin')->user()->id;
        session()->flash('success', trans('message.admin.vocation.updatedSuccess'));
        return $this->repository->create($params);
    }

    public function update($request, $id)
    {
        try {
            $vocation = $this->repository->find($id);
            DB::beginTransaction();
            $data = $request->all();
            $listImageS3New = [];
            $forder = "vocation";
            preg_match_all('/src="data:image[^ >]+"/i', $data['content'], $result);
            foreach ($result[0] as $image) {
                if (!strpos($image, config('filesystems.disks.s3.url'))) {
                    $img = getBase64ContentFromImageTag($image);
                    $imageS3 = $this->s3Services->storeBase64ImageToS3(
                        $img,
                        $vocation->community_id,
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
                $oldImageThumb = config('filesystems.disks.s3.url')."/".$vocation->thumbnail;
                $forder = "vocation";
                $dataImage = [
                    'imageNew' => $request->thumbnail,
                    'community' => $request->community_id,
                    'folder' => $forder
                ];
                $imageUrl = $this->s3Services->uploadImage($dataImage);
                $data['thumbnail'] = $imageUrl ?? config('constants.vocation_thumbnail_default');
                if (!$vocation->is_thumbnail_default) {
                    $this->s3Services->isDestroy($oldImageThumb);
                }
            }
            $this->repository->update($data, $id);
            session()->flash('success', trans('message.admin.vocation.updatedSuccess'));
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->writeExceptionLog('Update vocation', $exception);
            return abort('404');
        }
    }

    public function getListS3ImageUrlById($newId)
    {
        $result = [];
        $vocation = $this->repository->find($newId);
        preg_match_all('/src[^ >]+"/i', $vocation->content, $images);
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
        $vocation = $this->repository->find($id);
        preg_match_all('/src[^ >]+"/i', $vocation->content, $result);
        foreach ($result[0] as $image) {
            $imgUrl = getImageUrlFromImageTag($image);
            $this->s3Services->isDestroy($imgUrl);
        }
        $oldImageThumb = config('filesystems.disks.s3.url')."/".$vocation->thumbnail;
        if (!$vocation->is_thumbnail_default) {
            $this->s3Services->isDestroy($oldImageThumb);
        }
        $vocation->delete();
        session()->flash('success', trans('message.admin.vocation.deletedSuccess'));
        return response()->json([
            'code' => 200,
            'data' => trans('message.admin.vocation.deletedSuccess'),
        ]);
    }
}
