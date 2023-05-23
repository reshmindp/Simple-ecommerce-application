@extends('includes.header-footer')
@section('title','Order List')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Order List</h1>
          <p>Table to display Order details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="{{route('ecom.homepage')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Manage Orders</li>
          <li class="breadcrumb-item active">Order List</li>
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
                      <th>Order ID</th>
                      <th>Customer Name</th>
                      <th>Phone</th>
                      <th>Net amount</th>
                      <th>Order date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php 
                    $i = 1;
                    @endphp
                    @foreach($orders as $ord)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$ord->order_number}}</td>
                      <td>{{$ord->customer_name}}</td>
                      <td>{{$ord->phone_number}}</td>
                      <td>{{$ord->net_amount}}</td>
                      <td>{{$ord->order_date}}</td>
                      <td><a href="{{route('ecom.edit.order', $ord->order_id)}}">Edit</a> / <a onclick="return confirm('Are you sure want to delete?')" href="{{route('ecom.delete.order', $ord->order_id)}}">Delete</a> 
                        / <a href="{{route('ecom.view.invoice',$ord->order_id)}}">Invoice</a> </td>
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