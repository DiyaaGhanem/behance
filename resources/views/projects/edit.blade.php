@extends('layouts.app')

@section('title')
  Edit {{ $project->name }}
@endsection

@section('content')

  @include('inc.errors')

  <div class="row">
    <div class="col-md-6 offset-md-3">

      <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf 
        @method('PUT')
        
        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input type="text" value="{{ $project->name }}" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{ $project->desc }}</textarea>
        </div>


        {{-- <div class="form-group">
          <label for="exampleInputPassword1">Images</label>
          <input type="file" name="imgs[]" multiple class="form-control" id="exampleInputPassword1">
        </div> --}}

        @foreach ($devs as $dev)    
          <div class="form-check">
            <input class="form-check-input"  @if(in_array($dev->id, $dev_ids)) checked @endif  name="dev_ids[]" type="checkbox" value="{{ $dev->id }}" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              {{ $dev->name }}
            </label>
          </div>
        @endforeach
        

        <a href="{{ route('projects.index') }}" class="btn btn-info">Back</a>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>

    </div>
  </div>

 
    
@endsection

@section('images')
                  
                <form method="POST" action="{{ route('delete_all') }}">
                  @csrf
                  @method('DELETE')

@foreach ($project->imgs as $img)   
   
           
                  <img src='{{ asset("uploads/projects/$img->name") }}'style='width:300px' class='mt-5'>
                     <div class="form-check">
                        <input class="form-check-input" name="imgs_id[]" type="checkbox" value="{{ $img->id }}" id="defaultCheck1">
                    </div> 
                    <br>
                 <a href="{{ route('delete_image' , $img->id) }}" class="btn btn-danger mt-1">Delete</a>
                 <br>

           
        
@endforeach

             <button type="submit" class="btn btn-danger mt-1">Delete all selected selected</button>
             </form>



            





          
            
        












        <form method="POST" action="{{ route('addimages' , $project->id) }}" enctype="multipart/form-data">
        @csrf 
           <div class="form-group mt-3">
               <label for="exampleInputPassword1"><h4>add more Images</h4></label>
               <input type="file" name="imgs[]" multiple class="form-control-file" id="exampleInputPassword1">
            </div>        
               <button type="submit" class="btn btn-primary">add more Images</button>
       </form>
       <br>

    
  
@endsection









