@extends('includes.header-footer')
@section('title','User List')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> User List</h1>
          <p>Table to display user details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Manage Users</li>
          <li class="breadcrumb-item active">User List</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Position</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php 
                    $i = 1;
                    @endphp
                    @foreach($users as $user)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$user->firstname}}</td>
                      <td>{{$user->lastname}}</td>
                      <td>{{$user->position}}</td>
                      <td>@if($user->status==0) Do not Disturb @elseif($user->status==1) Online @else Away @endif</td>
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