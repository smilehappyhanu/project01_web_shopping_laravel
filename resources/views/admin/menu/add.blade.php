@extends('layouts.admin')

@section('title')
    <title>Home page</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Menu', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('menus.store') }}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label>Category name</label>
                        <input type="textbox" class="form-control" name="name" value="" placeholder="Enter menu name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select parent menu</label>
                        <select class="form-control" name="parent_id">
                            <option value="0">Select parent menu</option>
                            {{!! $optionSelect !!}}
                        </select>
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
  