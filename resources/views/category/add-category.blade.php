@extends('includes.header-footer')
@section('title','Add Category')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Category</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Add Category</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            
            <div class="tile-body">
              <form method="POST" enctype="multipart/form-data" action="{{route('ecom.add.category')}}">
                @csrf
                <div class="form-group">
                  <label class="control-label">Category Name</label>
                  {!!$errors->first('category_name', '<span style="color:red">:message</span>')!!}
                  <input class="form-control" value="{{old('category_name')}}" name="category_name" type="text" placeholder="Enter category name">
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

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php 
                    $i = 1;
                    @endphp
                    @foreach($categories as $cat)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$cat->category_name}}</td>
                      <td><a href="">Delete</a></td>
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
    