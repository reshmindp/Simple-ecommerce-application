@extends('includes.header-footer')
@section('title','Dashboard')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Welcome to Simple Ecommerce App</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="{{route('ecom.homepage')}}">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Navigate to Sidebar and Manage Options </div>
          </div>
        </div>
      </div>
    </main>
    @endsection
    