@extends('includes.header-footer')
@section('title','Edit Order')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Edit Order</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Edit Order</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <div class="tile-body">
              <form id="testform" method="POST" enctype="multipart/form-data" action="{{route('ecom.update.order')}}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Customer Name</label>
                  {!!$errors->first('customer_name', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" value="{{$order_info->customer_name}}" name="customer_name" type="text" placeholder="Enter customer name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Phone Number</label>
                  {!!$errors->first('phone_number', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" value="{{$order_info->phone_number}}" name="phone_number" type="number">
                </div>
                </div>
                </div>
                @foreach($order_products as $oProducts)
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Product</label>
                  {!!$errors->first('product_id', '<span style="color:red">:message</span>')!!}
                  <select id="pro_id" name="product_id[]" class="form-control">
                    <option value="">Select a Product</option>
                    @foreach($products as $pro)
                    <option data-amount="{{$pro->price}}" value="{{$pro->product_id}}" @if($pro->product_id == $oProducts->product_id) selected @endif>{{$pro->product_name}}</option>
                    @endforeach
                  </select>
                </div>
                  </div>
                  
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <div class="input-group">
                  
                          {!!$errors->first('quantity', '<span style="color:red">:message</span>')!!}
                          <input class="form-control" value="{{$oProducts->quantity}}" name="quantity[]" type="number" placeholder="Enter quantity">
            
                        </div>
                      </div>
                    </div>
                    
                </div>
                @endforeach
                <div class="row" id="dynamic-row">
                </div>
                
                <div class="tile-footer">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Order</button>
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

    @push('custom-js')
        <script type="text/javascript">
          var i = 0;
          $("#dynamic-add").click(function () {
              ++i;
              $("#dynamic-row").append('<div class="col-md-6"><div class="form-group"><label class="control-label">Product</label><select name="product_id['+i+'][product]" id="pro_id" class="form-control"><option value="">Select a Product</option>@foreach($products as $pro)<option value="{{$pro->product_id}}">{{$pro->product_name}}</option>@endforeach</select></div></div>'+
              '<div class="col-md-4"><div class="form-group"><label class="control-label">Quantity</label><div class="input-group"><input class="form-control" name="quantity['+i+'][qty]" type="number" placeholder="Enter quantity">&emsp;<button type="button" id="dynamic-remove" class="btn btn-primary">-</button></div></div></div>');
          });
          $(document).on('click', '#dynamic-remove', function () {
              $(this).parents('#dynamic-row').remove();
          });

        </script>
    @endpush

    @endsection
    