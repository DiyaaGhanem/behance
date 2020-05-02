@extends('layouts.app')

@section('title')
  Show - {{ $dev->name }}
@endsection

@section('content')

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <img src='{{ asset("uploads/devs/$dev->img") }}' class="w-100">
      <h5>{{ 'Developer Name: ' }}{{ $dev->name }}</h5>
      <p>{{ 'Developer Speciality: ' }}{{ $dev->spec }}</p>
      <p>{{ 'Developer Email: ' }}{{ $dev->email }}</p>

      <a href="{{ route('devs.index') }}">Back</a>
      <a href="{{ route('devs.edit', $dev->id) }}" class="btn btn-info">Edit</a>


    </div>
  </div>
    
  @foreach ($dev->projects as $project)
      <h1>{{ $project->name }}</h1>
      <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View {{$project->name}}</a>
          <br>
  @endforeach

@endsection