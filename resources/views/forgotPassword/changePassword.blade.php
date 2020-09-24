
@extends('layouts.app')
@section('content')



<div class="otp-main">

    <div class= "otp-sub">

        <div class="otp-form">

            @if(Session::has('message'))
		        <p class="alert alert-danger"> Wrong OTP! Session Expired <br>Try to <a href="/signin">Login</a> Again</p>


            @elseif(Session::has('me'))
                <p class="alert alert-danger">Entered Number is not Registered<br>Try to <a href="/signin">Login</a> Again</p>

            @else

              
            <form action="{{ url('/change') }}" >

                {{ csrf_field() }}



                <label>Enter New Password </label><br><br>

                <input type="text" name="pass" class="form-control input-sm" placeholder ="Password" required > <br>



                <button type="submit" id="otp-btn" class="btn btn-success">Submit</button> <br><br>

              

            </form>


            @endif  




        </div>
    </div>

</div>



@endsection
