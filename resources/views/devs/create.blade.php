@extends('layouts.app')

@section('title')
  Create Developer
@endsection

@section('content')

  @include('inc.errors')

  <div class="row">
    <div class="col-md-6 offset-md-3">

      <form method="POST" action="{{ route('devs.store') }}" enctype="multipart/form-data">
        @csrf 
        
        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">Speciality</label>
          <input type="text" name="spec" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Image</label>
          <input type="file" name="img" class="form-control" id="exampleInputPassword1">
        </div>


        
        <button type="submit" class="btn btn-primary">Create</button>
      </form>

    </div>
  </div>
    
@endsection