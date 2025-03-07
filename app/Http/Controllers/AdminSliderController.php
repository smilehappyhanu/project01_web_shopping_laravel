<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct (Slider $slider) {
        $this->slider = $slider;
    }
    public function index () {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }
    public function create () {
        return view('admin.slider.add');
    }
    public function store (SliderAddRequest $request) {
        try {
            $dataInsert = [
                'name' => $request->slider_name,
                'description' => $request->slider_description
            ];
            $dataImage = $this->storageImageUpload($request,'slider_image_path','slider');
            if (!empty($dataImage)) {
                $dataInsert['image_name'] = $dataImage['file_name'];
                $dataInsert['image_path'] = $dataImage['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('sliders.index');
        } catch (Exception $exception) {
            Log::error('Message: ' .$exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }
    public function edit ($id) {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update (Request $request,$id) {
        try {
            $dataUpdate = [
                'name' => $request->slider_name,
                'description' => $request->slider_description
            ];
            $dataImage = $this->storageImageUpload($request,'slider_image_path','slider');
            if (!empty($dataImage)) {
                $dataUpload['image_name'] = $dataImage['file_name'];
                $dataUpload['image_path'] = $dataImage['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('sliders.index');
        } catch (Exception $exception) {
            Log::error('Message: ' .$exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }
    public function delete ($id) {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Success'
            ],200);
        } catch (Exception $exception) {
            Log::error('Message: ' .$exception->getMessage() . 'line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Failed'
            ],500);
        }
    }
}
