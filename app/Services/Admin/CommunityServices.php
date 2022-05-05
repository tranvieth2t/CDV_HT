<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Interfaces\CommunityRepository;
use App\Services\BaseService;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class CommunityServices extends BaseService
{
    protected $repository;

    protected $s3Services;

    public function __construct(
        CommunityRepository $communityRepository,
        S3Service $s3Service
    )
    {
        $this->repository = $communityRepository;
        $this->s3Services  = $s3Service;
    }

    public function getListCommunity()
    {
        return $this->repository->pluck('name', 'id');
    }

    public function getListCommunityByRoleAdmin()
    {
        $admin = Auth::guard('admin')->user();
        $query = $this->repository;
        if ($admin->role_admin == AdminRole::EDITS or $admin->community_id == null) {
            $query = $query->where('id', $admin->community_id);
        }
        return $query
            ->pluck('name', 'id');
    }

    /**
     * @param Request $request
     * @param $id
     * @return bool|never
     * @throws \Throwable
     */

    public function update($request, $id)
    {
        try {
            $community = $this->repository->find($id);
            DB::beginTransaction();
            $data = $request->all();
            $forder = "community";

            if ($request->hasFile('thumbnail')) {
                $oldImageThumb = config('filesystems.disks.s3.url') . "/" . $community->thumbnail;
                $dataImage = [
                    'imageNew' => $request->thumbnail,
                    'community' => '',
                    'folder' => $forder
                ];
                $imageUrl = $this->s3Services->uploadImage($dataImage);
                $data['thumbnail'] = $imageUrl ?? config('constants.community_thumbnail_default');
                if (!$community->is_thumbnail_default) {
                    $this->s3Services->isDestroy($oldImageThumb);
                }
            }
            $this->repository->update($data, $id);
            session()->flash('success', trans('message.admin.community.updatedSuccess'));
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->writeExceptionLog('Update community', $exception);
            return abort('404');
        }
    }
}
