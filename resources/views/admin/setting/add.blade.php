@extends('layouts.admin')

@section('title')
    <title>Setting page</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Setting', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label>Config key</label>
                        <input type="textbox" class="form-control" name="config_key" value="" placeholder="Enter config value">
                    </div>
                    @if(request()->type === 'Text')
                        <div class="form-group">
                            <label>Config value</label>
                            <input type="textbox" class="form-control" name="config_value" value="" placeholder="Enter config value">
                        </div>
                        @elseif(request()->type === 'TextArea')
                            <div class="form-group">
                                <label>Config value</label>
                                <textarea class="form-control" name="config_value" rows=5></textarea>
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
  