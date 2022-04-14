<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Models\News;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class NewsServices extends BaseService
{
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function getListNews($per_page = 10)
    {
        $admin = Auth::guard('admin')->user();
        $query = $this->query()
            ->with(['admin', 'community']);

        if ($admin->role_code == AdminRole::EDITS) {
            $query = $query->where('community_id', $admin->community_id);
        }
        return $query
            ->with(['admin', 'community'])
            ->orderByDesc('updated_at')
            ->orderBy('verify')
            ->paginate($per_page);
    }
}
