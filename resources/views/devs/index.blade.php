@extends('layouts.app')

@section('title')
  All developers
@endsection

@section('content')
  <div class="row">
  @foreach($devs as $dev)
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src='{{ asset("uploads/devs/$dev->img") }}' class="card-img-top" alt="..." >
        <div class="card-body">
          <h5 class="card-title">{{'Name: ' . $dev->name }}</h5>
          <p class="card-text">{{'Speciality: ' . $dev->spec }}</p>
          <a href="{{ route('devs.show', $dev->id) }}" class="btn btn-primary">Show</a>
          <a href="{{ route('devs.edit', $dev->id) }}" class="btn btn-info">Edit</a>
          <form method="POST" action="{{ route('devs.destroy', $dev->id) }}">
            @csrf 
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  </div>
@endsection