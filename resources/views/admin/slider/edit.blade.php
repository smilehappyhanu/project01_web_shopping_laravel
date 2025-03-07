@extends('layouts.admin')

@section('title')
    <title>Slider page</title>
@endsection

@section('css')
<link href="{{ asset('adminside/slider/add/add.css') }}" rel="stylesheet" />
@endsection 

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Slider', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('sliders.update', ['id' => $slider->id]) }}" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Slider name</label>
                        <input type="textbox" class="form-control @error('slider_name') is-invalid @enderror" name="slider_name" value="{{ $slider->name }}" placeholder="Enter slider name">
                        @error('slider_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slider description</label>
                        <textarea class="form-control @error('slider_description') is-invalid @enderror" name="slider_description" row="3">{{ $slider->description }}</textarea>
                        @error('slider_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slider image</label>
                        <input type="file" name="slider_image_path" class="form-control-file @error('slider_image_path') is-invalid @enderror">
                        <img src="{{ $slider->image_path }}" alt="{{ $slider->image_name }}">
                        @error('slider_image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
            </div>
        
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  