@extends('layouts.admin')

@section('title')
    <title>Setting page</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', [ 'name' => 'Setting', 'key' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle m-2 float-right" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add setting
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button"><a href="{{ route ('settings.create') .'?type=Text'}}">Text</a></button>
                <button class="dropdown-item" type="button"><a href="{{ route ('settings.create') .'?type=TextArea' }}">Textarea</a></button>
            </div>
            </div>
          </div>      
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Config key</th>
                  <th scope="col">Config value</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($settings as $settingItem)
                <tr>
                  <th scope="row">{{ $settingItem->id }}</th>
                  <td>{{ $settingItem->config_key }}</td>
                  <td>{{ $settingItem->config_value }}</td>
                  <td>
                    <a href="{{ route('settings.edit',['id' => $settingItem->id]) . '?type=' . $settingItem->type }}" class="btn btn-default">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
         {{ $settings->links() }}
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  