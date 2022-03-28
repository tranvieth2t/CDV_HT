<?php

use App\Helpers\Menu;

function getTreeMenu($menus)
{
    foreach ($menus as $item) {
        echo '<li class="nav-item">
           <a class="nav-link collapsed" href='.url($item["route"]).' data-toggle="collapse" data-target="#collapse'.$item["id"].'"
               aria-expanded="false" aria-controls="collapse'.$item["id"].'">
                ' . $item["icon"] . '
               <span>'.$item["name"].'</span>
           </a>';
        if (isset($item["sub-menu"])) {
            echo '<div id="collapse'.$item["id"].'" class="collapse" aria-labelledby="heading'.$item["id"].'"
               data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">';
                foreach ($item["sub-menu"] as $submenu) {
                    echo '<a class="collapse-item" href='.url($submenu["route"]).'>'.$submenu["name"].'</a>';
                };
             echo '</div>
           </div>';
        }
       echo '</li>';
    }
}
