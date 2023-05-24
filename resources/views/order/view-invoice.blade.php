@extends('includes.header-footer')
@section('title','View Invoice')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> View Invoice</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th width="20">Order ID</th>
                      <td>{{$invoice_data->order_number}}</td>
                    </tr>
                    <tr>
                      <th width="20">Products</th>
                      <td>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($products as $pro)
                            <p>{{$i++.'. '.$pro->product_name.' X '.$pro->quantity.' = '.$pro->amount*$pro->quantity}}</p>
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <th width="20">Total</th>
                      <td>{{$invoice_data->net_amount}}</td>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
    @endsection
    