<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;
    public function __construct (MenuRecursive $menuRecursive, Menu $menu) {
        $this->menuRecursive = $menuRecursive; // init get data menu list
        $this->menu= $menu; // define instance menu with model
    }
    public function index () {
        $menus = $this->menu->latest()->paginate(10);
        return view('menu.index',compact('menus'));
    }
    public function create () {
        $optionSelect = $this->menuRecursive->MenuRecursiveAdd();
        return view ('menu.add',compact('optionSelect'));
    }
    public function store (Request $request) {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('menus.index');
    }
}
