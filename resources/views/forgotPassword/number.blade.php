@extends('layouts.app')
@section('content')
  

<div class = "forgot">

  <div class = "forgot-sub">


    <div class="forgot_form">

      <h1> Enter Number </h1>
 

      <form action="{{ url('/otp-sent') }}" class="form-group" >

        {{ csrf_field() }}


        <label>Please Enter Your Registered mobile no </label><br><br>
        <input type="text" name="no" maxlength="10" size="10" class="form-control input-sm" placeholder="Mobile no" required > <br>

        <button type="submit" class="btn btn-success"> Send OTP</button>

      </form>
    </div>
  </div>
</div>





















@endsection





