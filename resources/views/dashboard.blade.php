@extends('layouts.app')

@section('content')


<div class="container">
<div class="jumbotron">

<h3> Basic details </h3>


      @if(Session::has('success'))
		        <p class="alert alert-success">Data has been saved successfully !</p>


      @elseif(Session::has('error'))
            <p class="alert alert-danger">Data Already Present !</p>


      @endif

<form action="/save" class="form-group" method="POST" enctype="multipart/form-data">


    @csrf

    Business Name : <input type="text" name="businessname" class="form-control">

    Business Tagline : <input type="text" name="tagline" class="form-control">

    name : <input type="text" name="name" class="form-control">

    Number : <input type="text" name="number" class="form-control">

    Email : <input type="text" name="email" class="form-control">

    Address : <input type="text" name="address" class="form-control">

    Facebook Link : <input type="text" name="fbLink" class="form-control">

    Twitter Link : <input type="text" name="twitterLink" class="form-control">

    Instagram Link : <input type="text" name="instaLink" class="form-control">

    linkedin Link : <input type="text" name="linkedinLink" class="form-control">

    About Us : <input type="text" name="aboutUs" class="form-control">

    About Us Description : <input type="text" name="aboutusDesc" class="form-control">

    Image  : <input name="image1" type="file" >

    VCF  : <input name="vcf" type="file" > 

    <br>

    <button type="submit" name="submit" class="btn btn-success">Submit</button>


</form>

</div>
</div>


<div class="container">
<div class="jumbotron">


      @if(Session::has('service_success'))
		        <p class="alert alert-success">Data has been saved successfully ! <br> You can Add more services</p>
      @endif
<h3>Add Services </h3>

<form action="/service-save" class="form-group" method="POST" enctype="multipart/form-data">

    @csrf

    Title : <input type="text" name="title" class="form-control">

    Body : <textarea name="body" class="form-control"></textarea>


    <br>

    <button type="submit" name="submit" class="btn btn-success">Submit</button>


</form>

</div>
</div>


<div class="container">
<div class="jumbotron">

 @if(Session::has('project_success'))
		<p class="alert alert-success">Data has been saved successfully ! <br> You can Add more Projects</p>
  @endif

<h3>Add Projects </h3>

<form action="/project-save" class="form-group" method="POST" enctype="multipart/form-data">

    @csrf

    Title : <input type="text" name="title" class="form-control">

    Body : <textarea name="body" class="form-control"></textarea>

    Image  : <input name="image" type="file" >


    <br>

    <button type="submit" name="submit" class="btn btn-success">Submit</button>


</form>

</div>
</div>





@endsection
