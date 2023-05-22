@extends('includes.header-footer')
@section('title','Add Product')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Product</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Add Product</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            
            <div class="tile-body">
              <form method="POST" action="{{route('ecom.add.product')}}">
                @csrf
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  {!!$errors->first('product', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" value="{{old('product')}}" name="product" type="text" placeholder="Enter product name">
                </div>
                <div class="form-group">
                  <label class="control-label">Image</label>
                  {!!$errors->first('image', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" name="image" type="file">
                </div>
                <div class="form-group">
                  <label class="control-label">Category</label>
                  {!!$errors->first('category', '<span style="color:red">:message</span>')!!}
                  <select name="category" class="form-control">
                    <option value="">Select a Category</option>
                    <option value=""></option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Price</label>
                  {!!$errors->first('price', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" value="{{old('price')}}" name="price" type="number" placeholder="Enter price">
                </div>
                <div class="tile-footer">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
                  @if(Session::has('success'))
                  <br><br>
                  <div style="color: green;">
                  <strong>Success! </strong>{{Session::get('success')}}</div>
                  @endif
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </main>
    @endsection
    