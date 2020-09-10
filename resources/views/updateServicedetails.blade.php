@extends('layouts.app')

@section('content')




@foreach($data as $user)
 
  <div class="update">
    <div class="update-sub"><h2> Edit Details </h2>
      <form action="/edit-serviceDetails/{{ $user->id }}" class="form-group" method="POST" enctype="multipart/form-data">

  
        @csrf

       <label> Service Title : </label><input type="text" name="title" class="form-control" value="{{ $user->title}} " >

       <label> Service Description : </label><input type="text" name="body" class="form-control" value="{{ $user->body}} " > 
        <br>
      

        <button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Update</button>


      </form>

    </div>













  </div>



@endforeach




























@endsection