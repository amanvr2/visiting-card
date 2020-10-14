@extends('layouts.app')

@section('content')



@if(Session::has('updated'))
  <div class="update-msg"><div class="container">
    <p id = "updateMsg"  class="alert alert-success"> Details has been updated successfully </p>
  </div></div>
@endif





<div class="myDetails"> 
  <div class="myDetails-sub">  
    <div class="myDetails-head">
      <h1>My Details </h1>
    </div> 

    @if($idCount == 0) 
      <p> No Details Added </p> 
      <a href="/add"> Add Now </a>
    @else

    @foreach($data as $user)
 
     
      <img src="{{ asset('/public/Cover-img/' . $user->image2) }}" id="cover"> 
      <img src="{{ asset('/public/img/' . $user->image1) }}" id="profile">
      <div class="myDetails-content"> 
        <p> <b> Business Name :</b> {{ $user->businessname }} </p>  
        <p> <b> Business Tagline :</b> {{ $user->tagline }} </p>
        <p> <b> Name :</b> {{ $user->name }} </p>
        <p> <b> Number :</b> {{ $user->number }} </p>
        <p> <b> Email :</b> {{ $user->email }} </p>
        <p> <b> Address :</b> {{ $user->address }} </p>
        <p> <b> Website Link :</b> {{ $user->website }} </p>
        <p> <b> Facebook Link :</b> {{ $user->fbLink }} </p>
        <p> <b> Twitter Link :</b> {{ $user->twitterLink }} </p> 
        <p> <b> Instagram Link :</b> {{ $user->instaLink }} </p>
        <p> <b> Linkedin Link :</b> {{ $user->linkedinLink }} </p>
        <p> <b> Google Map Link :</b> {{ $user->maplink }} </p>
        <p> <b> About Us :</b> {{ $user->aboutUs }} </p>
        <p> <b> My Link :</b> {{ $user->link }} </p><br>
        <a href="/show-basicDetails/{{ $user->id }}" id="editbigbtn" role="button" class="btn btn-primary">Edit</a> 
      </div>
     
    @endforeach
    @endif
  </div>

 

 


</div>






<div class="myservice">
  <div class="myservice-sub"> 
  <h1>My Services</h1>

    @if($serviceCount == 0) 
      <p> No Services Added </p> 
      <a href="/add"> Add Now </a>
    @else

    @foreach($serviceData as $user)
 
    <div class="myservice-item">
      <div class="myserviceItem-list">
        <div class="myserviceItem-item">
          <h3> {{  $user->title }} </h3>  
          <p> {{  $user->body }} </p> 
        </div>
        <br>
        <div class="myserviceItem-item">
          <a href="/show-serviceDetails/{{ $user->id }}" id="editbtn" role="button" class="btn btn-primary">Edit</a> 
          <a href="/service-delete/{{ $user->id }}" id="editbtn" role="button" class="btn btn-danger">Delete</a> 
        </div>
     
    
      </div>
       



    </div>
    @endforeach 
    @endif
  </div>
</div> 
  

<div class="myproject"> 
  <div class="myproject-sub">
  <h1>My Projects</h1>

    @if($projectCount == 0) 
      <p> No Projects Added </p> 
      <a href="/add"> Add Now </a>
    @else

    @foreach($projectData as $user)

      <div class="project-item"> 

        <div class="projectItem-list">

          <div class="project-image">
            <img src="{{ asset('/public/project-images/' . $user->image) }}" >
              @if($user->image1 != NULL)
                <img src="{{ asset('/public/project-images/' . $user->image1) }}" >
              @endif  
          </div>
 
          <div class="project-contents"> 

            <h2> {{ $user->title }} </h2>
            <p> {{ $user->body }} </p>
            <a href="/show-projectDetails/{{ $user->id }}" id="editbtn" role="button" class="btn btn-primary">Edit</a>
            <a href="/project-delete/{{ $user->id }}" id="editbtn" role="button" class="btn btn-danger">Delete</a>
          </div>
 
         
        </div>

      </div>

    @endforeach
    @endif
</div> 
</div>





@foreach($vcfData as $user)
  
  <div class="update">
    <div class="update-sub"><h2> Edit VCF </h2>
      <form action="/edit-vcf/{{ $user->id }}" class="form-group" method="POST" enctype="multipart/form-data"> 

  
        @csrf

       <label> VCF : </label><input type="file" name="vcf" class="form-control" required>

       
        <br>
      

        <button type="submit" name="submit" id="saveBtn"class="btn btn-success"><i id="saveIcon" class="fa fa-floppy-o" aria-hidden="true"></i>Update</button>


      </form>

    </div>

  </div>

@endforeach















































































@endsection