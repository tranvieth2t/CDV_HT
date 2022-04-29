<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Interfaces\BannerRepository;
use App\Services\BaseService;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class BannerServices extends BaseService
{
    protected $repository;
    protected $s3Services;

    public function __construct(BannerRepository $repository, S3Service $s3Service)
    {
        $this->repository = $repository;
        $this->s3Services = $s3Service;
    }

    public function getListBanner($perPage = null, $condition = [])
    {
        return $this->repository->getListBanner($perPage, $condition);
    }


    public function createBanner($request)
    {
        $params = $request->all();
        $forder = "banner";

        if ($request->hasFile('thumbnail')) {
            $dataImage = [
                'imageNew' => $request->thumbnail,
                'folder' => $forder,
                'community' =>  ''
            ];
            $imageUrl = $this->s3Services->uploadImage($dataImage);
        }
        $params['thumbnail'] = $imageUrl ?? config('constants.banner_thumbnail_default');


        if ($request->hasFile('thumbnail_small')) {
            $dataImage = [
                'imageNew' => $request->thumbnail_small,
                'folder' => $forder,
                'community' =>  ''
            ];
            $imageUrl = $this->s3Services->uploadImage($dataImage);
        }
        $params['thumbnail_small'] = $imageUrl ?? config('constants.banner_thumbnail_small_default');
        $params['created_by'] = Auth::guard('admin')->user()->id;

        session()->flash('success', trans('message.admin.banner.updatedSuccess'));
        return $this->repository->create($params);
    }

    public function update($request, $id)
    {
        try {
            $banner = $this->repository->find($id);
            DB::beginTransaction();
            $data = $request->all();
            $forder = "banner";

            if ($request->hasFile('thumbnail')) {
                $oldImageThumb = config('filesystems.disks.s3.url')."/".$banner->thumbnail;
                $dataImage = [
                    'imageNew' => $request->thumbnail,
                    'community' => '',
                    'folder' => $forder
                ];
                $imageUrl = $this->s3Services->uploadImage($dataImage);
                $data['thumbnail'] = $imageUrl ?? config('constants.banner_thumbnail_default');
                if (!$banner->is_thumbnail_default) {
                    $this->s3Services->isDestroy($oldImageThumb);
                }
            }

            if ($request->hasFile('thumbnail_small')) {
                $oldImageThumb = config('filesystems.disks.s3.url')."/".$banner->thumbnail_small;
                $dataImage = [
                    'imageNew' => $request->thumbnail_small,
                    'community' => '',
                    'folder' => $forder
                ];
                $imageUrl = $this->s3Services->uploadImage($dataImage);
                $data['thumbnail_small'] = $imageUrl ?? config('constants.banner_thumbnail_small_default');
                if (!$banner->is_thumbnail_small_default) {
                    $this->s3Services->isDestroy($oldImageThumb);
                }
            }
            $this->repository->update($data, $id);
            session()->flash('success', trans('message.admin.banner.updatedSuccess'));
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->writeExceptionLog('Update banner', $exception);
            return abort('404');
        }
    }

    public function delete($id)
    {
        $banner = $this->repository->find($id);
        $oldImageThumb = config('filesystems.disks.s3.url')."/".$banner->thumbnail;
        if (!$banner->is_thumbnail_default) {
            $this->s3Services->isDestroy($oldImageThumb);
        }

        $oldImageThumb = config('filesystems.disks.s3.url')."/".$banner->thumbnail_small;
        if (!$banner->is_thumbnail_small_default) {
            $this->s3Services->isDestroy($oldImageThumb);
        }
        $banner->delete();
        session()->flash('success', trans('message.admin.banner.deletedSuccess'));
        return response()->json([
            'code' => 200,
            'data' => trans('message.admin.banner.deletedSuccess'),
        ]);
    }
}
