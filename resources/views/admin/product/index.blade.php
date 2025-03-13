@extends('layouts.admin')

@section('title')
    <title>Product page</title>
@endsection

@section('css')
<link href="{{ asset('adminside/product/list/list.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('adminside/product/list/list.js') }}"></script>
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
            <a href="{{ route ('products.create') }}" class="btn btn-success float-right m-2">Add product</a>
          </div>      
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $productItem)
                
                <tr>
                  <th scope="row">{{ $productItem->id }}</th>
                  <td>{{ $productItem->name }}</td>
                  <td>{{ number_format($productItem->price) }}</td>
                  <td>
                    <img src="{{ $productItem->feature_image_path }}" alt="{{ $productItem->feature_image_name }}" class="product_image">
                  </td>
                  <td>{{ optional($productItem->category)->name }}</td>
                  <td>                
                    <a href="{{ route('products.edit',['id' => $productItem->id] ) }}" class="btn btn-default">Edit</a>
                    <a 
                      href=" "
                      data-url="{{ route('products.delete',['id' => $productItem->id]) }}" 
                      class="btn btn-danger action_delete_product">
                      Delete
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
           {{ $products->links() }}
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection

  