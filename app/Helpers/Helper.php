<?php

use App\Helpers\Menu;

function getTreeMenu($menus)
{
    foreach ($menus as $item) {
        echo '<li class="nav-item">
           <a class="nav-link collapsed" href=' . url($item["route"]) . ' data-toggle="collapse" data-target="#collapse' . $item["id"] . '"
               aria-expanded="false" aria-controls="collapse' . $item["id"] . '">
                ' . $item["icon"] . '
               <span>' . $item["name"] . '</span>
           </a>';
        if (isset($item["sub-menu"])) {
            echo '<div id="collapse' . $item["id"] . '" class="collapse" aria-labelledby="heading' . $item["id"] . '"
               data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">';
            foreach ($item["sub-menu"] as $submenu) {
                echo '<a class="collapse-item" href=' . url($submenu["route"]) . '>' . $submenu["name"] . '</a>';
            };
            echo '</div>
           </div>';
        }
        echo '</li>';
    }
}

function generatePassword($length = \App\Enums\AdminRole::DEFAULT_PASSWORD_LENGTH)
{
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < $length; $i++) {
        $position = rand(0, $alphaLength);
        $pass[] = $alphabet[$position];
    }
    return implode($pass);
}

function getListCommunityByRoleId()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $user = \Illuminate\Support\Facades\Auth::guard('admin')->user() ?? [];
    if (!isset($_SESSION['listCommunity'])) {
        if ($user->role_admin != \App\Enums\AdminRole::SUPPER_ADMIN) {
            $data = \Illuminate\Support\Facades\DB::table('community')
                ->select('id', 'name')
                ->where('id', $user->community_id)
                ->get();
        } else {
            $data = \Illuminate\Support\Facades\DB::table('community')
                ->select('id', 'name')
                ->get();
        }
        $_SESSION['listCommunity'] = $data;
    } else{
        $data = $_SESSION['listCommunity'];
    }

    return $data;
}

function getFullCommunity()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['listCommunityByUser'])) {
        $data= \Illuminate\Support\Facades\DB::table('community')->get(['id', 'name']);
        $_SESSION['listCommunityByUser'] = $data;
    } else{
        $data = $_SESSION['listCommunityByUser'];
    }
    return $data;
}

function convertTimeDbToTimeString($time)
{
    return date('Y-m-d H:i:s', strtotime($time));
}

function convertTimeDbToTimeStringDate($time)
{
    return date('Y-m-d', strtotime($time));
}
function getDomainShowImage(): string
{
    return config('app.env') == 'local' ? asset('storage') . '/' : config('filesystems.disks.s3.url') . '/';
}

function getBase64ContentFromImageTag($image)
{
    return substr($image, 5, strlen($image) - 7);
}

function getImageUrlFromImageTag($image)
{
    return substr($image, 5, strlen($image) - 6);
}