@extends('layouts.admin')

@section('title')
    <title>User page</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('adminside/product/add.css') }}" rel="stylesheet" />
@endsection 


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'User', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('users.store') }}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label>User name</label>
                        <input type="textbox" class="form-control" name="user_name" value="" placeholder="Enter user name">                        
                    </div>
                    <div class="form-group">
                        <label>User email</label>
                        <input type="textbox" class="form-control" name="user_email" value="" placeholder="Enter user email">                        
                    </div>
                    <div class="form-group">
                        <label>User password</label>
                        <input type="password" class="form-control" name="user_password" value="" placeholder="Enter user password">                        
                    </div>
                    <div class="form-group">
                        <label>User role</label>
                        <select name="user_role_id[]" class="form-control user_role_select2" multiple>
                            <option value=""></option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{ $role->name }}</option>
                            @endforeach
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

  @section('js')
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <script src="{{ asset('adminside/user/add.js') }}"></script>
  @endsection
  