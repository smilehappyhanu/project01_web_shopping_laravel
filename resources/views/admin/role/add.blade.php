@extends('layouts.admin')

@section('title')
    <title>Role page</title>
@endsection

@section('css')
<link href="{{ asset('adminside/slider/add/add.css') }}" rel="stylesheet" />
@endsection 

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Role', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="" method = "POST" style="width:100%">
            @csrf
            <div class="col-md-12">              
                <div class="form-group">
                    <label>Role name</label>
                    <input type="textbox" class="form-control" name="role_name" value="" placeholder="Enter role name">                   
                </div>
                <div class="form-group">
                    <label>Role description</label>
                    <textarea class="form-control" name="role_description" row="3"></textarea>                   
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">              
                    <div class="card border-primary mb-3 col-md-12">
                        <div class="card-header">
                            <label>
                                <input type="checkbox" value="">
                            </label>
                            Module product
                        </div>
                        <div class="row">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="card-body text-primary col-md-3">                         
                                <h5 class="card-title">
                                    <label>
                                        <input type="checkbox" value="">
                                    </label>
                                    Add product
                                </h5>                                   
                            </div>
                        @endfor  
                        </div>                       
                    </div>              
                </div>              
            </div>
            <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  