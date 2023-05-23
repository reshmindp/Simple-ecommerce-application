@extends('includes.header-footer')
@section('title','New Order')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> New Order</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Add Order</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <div class="tile-body">
              <form method="POST" enctype="multipart/form-data" action="{{route('ecom.add.product')}}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Customer Name</label>
                  {!!$errors->first('customer_name', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" value="{{old('customer_name')}}" name="customer_name" type="text" placeholder="Enter customer name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Phone Number</label>
                  {!!$errors->first('phone_number', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" name="phone_number" type="number">
                </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Product</label>
                  {!!$errors->first('product_id', '<span style="color:red">:message</span>')!!}
                  <select name="product_id" class="form-control">
                    <option value="">Select a Product</option>
                    @foreach($products as $pro)
                    <option value="{{$pro->product_id}}">{{$pro->product_name}}</option>
                    @endforeach
                  </select>
                </div>
                  </div>
                  
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <div class="input-group">
                  
                          {!!$errors->first('price', '<span style="color:red">:message</span>')!!}
                          <input class="form-control" value="{{old('price')}}" name="price" type="number" placeholder="Enter price">
                          &emsp;
                          <a href="" class="btn btn-primary">+</a>
                        </div>
                      </div>
                
                    </div>
                    
                </div>
                <div class="tile-footer">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Place Order</button>
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
    