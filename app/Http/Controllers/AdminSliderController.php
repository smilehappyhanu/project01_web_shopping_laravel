<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;

class AdminSliderController extends Controller
{
    public function index () {
        return view('admin.slider.index');
    }
    public function create () {
        return view('admin.slider.add');
    }
    public function store (SliderAddRequest $request) {

    }
}
