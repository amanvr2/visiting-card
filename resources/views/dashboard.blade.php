@extends('layouts.app')

@section('content') 
@if($count == 0) 
<div class="payment">

  <div class="payment-list">

    <a href="/freeTrial" role="button" class="btn btn-success"> <i class="fa fa-play-circle" aria-hidden="true"></i>Free Trial 15 days </a>

    <a href="https://shoperkart-rel.herokuapp.com/payments?userId={{auth()->user()->id}}" role="button" class="btn btn-warning"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Buy Subscription </a>
 
    

  </div>
 
</div>
 
@else


<div class="sidenav">
  <a href="/dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
  <a href="/add"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Details</a>
  <a href="/my-details"><i class="fa fa-pencil" aria-hidden="true"></i>My Details</a>
  <a href="https://shoperkart-rel.herokuapp.com/payments?userId=9"><i class="fa fa-credit-card" aria-hidden="true"></i>Uprade Now</a>
  <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign Out</a>
</div>
 
<div class="dashDetails">
  <h1> Hello ! Your Plan is Active </h1>
  
  <div class="daysBox">
    <h2> Days Left : {{$daysLeft}} </h2>
  </div>

</div>

@endif



@endsection
