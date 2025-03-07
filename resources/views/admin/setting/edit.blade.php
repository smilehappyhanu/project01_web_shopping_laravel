@extends('layouts.admin')

@section('title')
    <title>Setting page</title>
@endsection

@section('css')
<link href="{{ asset('adminside/setting/add.css') }}" rel="stylesheet" />
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Setting', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label>Config key</label>
                        <input type="textbox" class="form-control @error('config_key') is-invalid @enderror" name="config_key" value="{{ $setting->config_key }}" placeholder="Enter config value">
                        @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(request()->type === 'Text')
                        <div class="form-group">
                            <label>Config value</label>
                            <input type="textbox" class="form-control @error('config_value') is-invalid @enderror" name="config_value" value="{{ $setting->config_value }}" placeholder="Enter config value">
                            @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @elseif(request()->type === 'TextArea')
                            <div class="form-group">
                                <label>Config value</label>
                                <textarea class="form-control @error('config_value') is-invalid @enderror" name="config_value" rows=5>{{ $setting->config_value }}</textarea>
                                @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    @endif
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
  