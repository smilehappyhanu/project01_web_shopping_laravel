@extends('layouts.admin')

@section('title')
    <title>Product page</title>
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
                <form action="{{ route('products.store') }}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="textbox" class="form-control" name="name" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select category</label>
                        <select class="form-control" name="parent_id">
                            <option value="0">Select category</option>
                            {!! $htmlOption !!}
                        </select>
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
  