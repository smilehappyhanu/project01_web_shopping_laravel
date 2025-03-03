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
                <form action="" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="textbox" class="form-control" name="name" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label>Product price</label>
                        <input type="textbox" class="form-control" name="price" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label>Product main image</label>
                        <input type="file" class="form-control" name="feature_image_path">
                    </div>
                    <div class="form-group">
                        <label>Product detail image</label>
                        <input type="file" class="form-control" name="image_path[]" multiple>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select parent category</label>
                        <select class="form-control category_select2" name="parent_id">
                            {{-- <option value="0">Select parent category</option> --}}
                            {!! $htmlOption !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enter product tag</label>
                        <select class="form-control tags_product_select2" multiple="multiple">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter content</label>
                        <textarea class="form-control" rows="3" name="content"></textarea>
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
 
  <script>
    $(function(){
        $(".tags_product_select2").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
        $(".category_select2").select2({
            placeholder: "Select a product category",
            allowClear: true
        }); 
    })
  </script>
  @endsection