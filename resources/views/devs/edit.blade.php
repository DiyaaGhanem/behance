@extends('layouts.app')

@section('title')
  Edit {{ $dev->name }}
@endsection

@section('content')

  @include('inc.errors')

  <div class="row">
    <div class="col-md-6 offset-md-3">

      <form method="POST" action="{{ route('devs.update', $dev->id) }}" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        
        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input type="text" value="{{ $dev->name }}" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" value="{{ $dev->email }}" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">Speciality</label>
          <input type="text" value="{{ $dev->spec }}" name="spec" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Image</label>
          <input type="file" name="img" class="form-control" id="exampleInputPassword1">
        </div>


        <img src="{{ asset('uploads/devs/'. $dev->img) }}" class="w-100" alt="">

        
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('devs.index') }}" class="btn btn-info">Back</a>
      </form>

    </div>
  </div>
    
@endsection
