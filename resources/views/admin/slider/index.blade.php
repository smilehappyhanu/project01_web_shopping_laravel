@extends('layouts.admin')

@section('title')
    <title>Slider page</title>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('adminside/slider/list/list.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', [ 'name' => 'Slider', 'key' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('sliders.create') }}" class="btn btn-success float-right m-2">Add slider</a>
          </div>      
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Slider name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($sliders as $sliderItem)
                <tr>
                  <th scope="row">{{ $sliderItem->id }}</th>
                  <td>{{ $sliderItem->name }}</td>
                  <td><{{ $sliderItem->description }}/td>
                  <td><img src="{{ $sliderItem->image_path }}" alt="{{ $sliderItem->image_name }}"></td>
                  <td>
                    <a href="{{ route ('sliders.edit',['id' => $sliderItem->id]) }}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{ route ('sliders.delete',['id' => $sliderItem->id]) }}" class="btn btn-danger action_delete_slider">Delete</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{ $sliders->links() }}
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  