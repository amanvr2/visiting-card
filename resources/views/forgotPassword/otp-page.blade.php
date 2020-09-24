
@extends('layouts.app')
@section('content')



<div class="otp-main">

    <div class= "otp-sub">

        <div class="otp-form">

            @if(Session::has('message'))
		        <p class="alert alert-danger"> Wrong OTP! Session Expired <br> <a href="/forgot-password">Try Again</a></p>


          

            @else

              
            <form action="{{ url('/verify') }}" >

                {{ csrf_field() }}



                <label>We have sent an OTP on Entered Mobile No: </label><br><br>

                <input type="text" name="otp" maxlength="4" size="4" class="form-control input-sm" placeholder ="OTP" required > <br>



                <button type="submit" id="otp-btn" class="btn btn-success">Submit</button> <br><br>

               <p> Did'nt Receive OTP ?  <a href="/resend-otp" role="button" class="btn btn-default">Resend</a>


            </form>


            @endif  




        </div>
    </div>

</div>



@endsection
