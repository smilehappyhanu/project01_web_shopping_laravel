@extends('layouts.admin')

@section('title')
    <title>Product page</title>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Product', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('products.store') }}" method = "POST" enctype="multipart/form-data">
                    @csrf
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
                        <select class="form-control" name="parent_id">
                            <option value="0">Select category</option>
                            {!! $htmlOption !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product description</label>
                        <textarea class="form-control" name="content" row="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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

  @section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @endsection
  