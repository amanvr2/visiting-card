@extends('layouts.app')

@section('content') 
@if($count == 0)
<div class="payment">

  <div class="payment-list">

    <a href="/freeTrial" role="button" class="btn btn-warning"> Free Trial 15 days </a>

    <a href="https://shoperkart-rel.herokuapp.com/payments?userId={{auth()->user()->id}}" role="button" class="btn btn-warning"> Buy Subscription </a>
 
    

  </div>

</div>

@else
<h1> Hello ! Your Plan is Active. </h1>

@endif

@endsection
