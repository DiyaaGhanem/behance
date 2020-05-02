@extends('layouts.app')

@section('title')
  All Projects
@endsection

@section('content')
  <div class="row">
  @foreach($projects as $project)
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src='{{ asset("uploads/projects/{$project->imgs[0]->name}") }}' class="card-img-top" alt="..." >
        <div class="card-body">
          <h5 class="card-title">{{'Project Name: ' .  $project->name }}</h5>
          <p class="card-text">{{'Project Description: ' .  Str::limit($project->desc, 30) . "..." }}</p>
          <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Show</a>
          <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info">Edit</a>

          <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
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