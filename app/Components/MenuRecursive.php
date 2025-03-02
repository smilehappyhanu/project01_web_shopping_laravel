<?php

namespace App\Components;

use App\Menu;

class MenuRecursive {
    private $html;
    public function __construct () {
        $this->html = '';
    }
    public function MenuRecursiveAdd ($parentId = 0, $subtext='') {
        $data = Menu::where('parent_id', $parentId)->get(); // check and get list data parent menu
        foreach ($data as $dataItem) {
            $this->html .='<option value="'.$dataItem->id.'">'.$subtext. $dataItem->name. '</option>';
            $this->MenuRecursiveAdd($dataItem->id,$subtext.'--');
        }
        return $this->html;
    }
}



?>