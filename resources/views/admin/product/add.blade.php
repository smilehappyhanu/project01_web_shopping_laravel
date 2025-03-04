@extends('layouts.admin')
 
@section('title')
    <title>Product page</title>
@endsection
 
@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('adminside/product/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Product', 'key' => 'Add'])
    <!-- /.content-header -->
 
    <!-- Main content -->
    <form action="{{ route('products.store') }}" method = "POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">             
              <div class="form-group">
                <label>Product name</label>
                <input type="textbox" class="form-control" name="name" placeholder="Enter product name">
              </div>
              <div class="form-group">
                <label>Product price</label>
                <input type="textbox" class="form-control" name="price" placeholder="Enter product price">
              </div>
              <div class="form-group">
                <label>Product avatar image</label>
                <input type="file" class="form-control-file" name="feature_image_path">
              </div>
              <div class="form-group">
                <label>Product detail image</label>
                <input type="file" class="form-control-file" name="image_path[]">
              </div>
              <div class="form-group">
                <label>Product tag</label>
                <select class="form-control product_tag_select2" multiple="multiple" name="tags[]">  
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select category</label>
                <select class="form-control product_category_select2" name="parent_id">
                    <option value="0">Select category</option>
                      {!! $htmlOption !!}
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Product description</label>
              <textarea class="form-control tinymce5_init_content" name="content" row="3"></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </form>
  </div>
  <!-- /.content-wrapper -->
 
  @endsection

  @section('js')
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <!-- <script src="{{ asset('vendors/tinymce5/tinymce.min.js') }}"></script> -->
  <script src="https://cdn.tiny.cloud/1/ra4r4f3igtnvr2qzcdib2ve1jnmuxqoojkqqfrrwrae40qgl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('adminside/product/add.js') }}"></script>
  @endsection