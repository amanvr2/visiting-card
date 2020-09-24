@extends('layouts.app')

@section('content')




@foreach($data as $user)
  
  <div class="update">
  <div class="update-sub"><h2> Edit Details </h2>
    <form action="/edit-basicDetails/{{ $user->id }}" class="form-group" method="POST" enctype="multipart/form-data">

 
      @csrf

      <label>Business Name :</label> <input type="text" name="businessname" class="form-control" value="{{ $user->businessname}} " >

      <label>Business Tagline : </label><input type="text" name="tagline" class="form-control" value="{{ $user->tagline}} " >

      <label>Name : </label><input type="text" name="name" class="form-control" value="{{ $user->name}} " >

      <label>Number : </label><input type="text" name="number" class="form-control" value="{{ $user->number}} " >

      <label>Email : </label><input type="text" name="email" class="form-control" value="{{ $user->email}} " >

      <label>Full Address :</label> <input type="text" name="address" class="form-control" value="{{ $user->address}} " >
      <label>Website Link :</label> <input type="text" name="website" class="form-control" value="{{ $user->website}} ">
      <label>Facebook Link :</label> <input type="text" name="fbLink" class="form-control" value="{{ $user->fbLink}} ">

      <label>Twitter Link :</label> <input type="text" name="twitterLink" class="form-control" value="{{ $user->twitterLink}} ">

      <label>Instagram Link : </label><input type="text" name="instaLink" class="form-control" value="{{ $user->instaLink}} ">

      <label>linkedin Link : </label><input type="text" name="linkedinLink" class="form-control" value="{{ $user->linkedinLink}} ">

      <label>About Us :</label> <input type="text" name="aboutUs" class="form-control" value="{{ $user->aboutUs}} ">

      <label>Profile Image :</label> <input name="image1" type="file" value="{{ $user->image1}} " >

      <label>Cover Image :</label> <input name="image2" type="file" value="{{ $user->image2}} " >  

      <br>

      <button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Update</button>


    </form>

    </div>













  </div>



@endforeach




























@endsection