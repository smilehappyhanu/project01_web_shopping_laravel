@extends('layouts.admin')

@section('title')
    <title>Product page</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', [ 'name' => 'Product', 'key' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Add product</a>
          </div>      
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Category</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               {{-- {{@foreach ($categories as $category)}} --}}
                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <img src="" alt="">
                  </td>
                  <td>
                    <a href="" class="btn btn-default">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
               {{-- @endforeach --}}
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
           {{--{{ $categories->links()}} --}}
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
  