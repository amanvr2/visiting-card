@extends('layouts.app')

@section('content')

 
<div class="home-banner"> 
  <div class="home-head">

    <h1>Digital Business Cards for any profession </h1>

    <p>MyCred"s digital business card platform makes designing a card simple, convenient and reliable .<br>Create what you need in no time!</p>

    <a href="/register" role="button" class="btn btn-primary"><i class="fa fa-chevron-right" aria-hidden="true"></i>Get Started </a>


  </div>


</div>

<div class="howitWorks">
  <div class="howitWorks-head">
    <h2> How it works </h2>
    <p>Create beautiful "Contactless" Digital Business Cards in seconds. </p>

  </div>

  <div class="howitWorks-list">

    <div class="howitWorks-item">
      <img src="/images/sign.jpg" alt="signup">

      <h4> Sign Up </h4>
      <p> Create your free account </p>


    </div>

    <div class="howitWorks-item">

      <img src="/images/form.jpg" alt="signup">

      <h4> Create Your Card </h4>
      <p> Add basic, services and project details </p>
    </div>

    <div class="howitWorks-item">
      <img src="/images/share.jpg" alt="signup">

      <h4> Share Your Card </h4>
      <p> Share your digital business card with anyone</p>

    </div>



  </div>




</div>




@endsection