@extends('layouts.app')

@section('content')




@foreach($data as $user)
 
  <div class="update">
    <div class="update-sub"><h2> Edit Details </h2>
      <form action="/edit-projectDetails/{{ $user->id }}" class="form-group" method="POST" enctype="multipart/form-data">

   
        @csrf

        <label> Project Title : </label><input type="text" name="title" class="form-control" value="{{ $user->title}} " >

        <label> Project Description : </label><input type="text" name="body" class="form-control" value="{{ $user->body}} " > 

        <label> Project Image 1 : </label><input type="file" name="image" class="form-control" value="{{ $user->image}} " > 
        <label> Project Image 2 : </label><input type="file" name="image1" class="form-control" value="{{ $user->image1}} " > 
        <br>
        <button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Update</button>


      </form>

    </div>
  












  </div>



@endforeach






@endsection