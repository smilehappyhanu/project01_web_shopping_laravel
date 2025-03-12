@extends('layouts.admin')

@section('title')
    <title>Role page</title>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('adminside/main.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', [ 'name' => 'Role', 'key' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add role</a>
          </div>      
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Role name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($roles as $role)
                <tr>
                  <th scope="row">{{ $role->id }}</th>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name }}</td>
                  <td>
                    <a href="{{ route('roles.edit',['id' => $role->id ]) }}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{ route('roles.delete',['id' => $role->id ]) }}" class="btn btn-danger action_delete_role">Delete</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{ $roles->links() }}
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  