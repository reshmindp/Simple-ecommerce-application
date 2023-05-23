@extends('includes.header-footer')
@section('title','Product List')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Product List</h1>
          <p>Table to display product details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="{{route('ecom.homepage')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Manage Products</li>
          <li class="breadcrumb-item active">Product List</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              @if(Session::has('success'))
                  <div style="color: green;">
                  <strong>Success! </strong>{{Session::get('success')}}</div>
                  <br><br>
                  @endif
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php 
                    $i = 1;
                    @endphp
                    @foreach($products as $pro)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$pro->product_name}}</td>
                      <td>{{$pro->category_name}}</td>
                      <td>{{$pro->price}}</td>
                      <td><a href="{{route('ecom.edit.product', $pro->product_id)}}">Edit</a> / <a onclick="return confirm('Are you sure want to delete?')" href="{{route('ecom.delete.product', $pro->product_id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    @endsection