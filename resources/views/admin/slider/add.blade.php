@extends('layouts.admin')

@section('title')
    <title>Home page</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Slider', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Slider name</label>
                        <input type="textbox" class="form-control" name="name" value="" placeholder="Enter slider name">
                    </div>
                    <div class="form-group">
                        <label>Slider description</label>
                        <textarea class="form-control" name="description" row="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Slider image</label>
                        <input type="file" name="image_path" class="form-control-file">
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
  