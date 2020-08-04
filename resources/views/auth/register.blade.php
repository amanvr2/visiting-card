@extends('layouts.app')



@section('content')

<div class="main">

    <div class="sign-upImage">

      <img src="/images/man-signup.png">

    </div>




    <div class="register">


        <div class="form"> 
            <i class="fa fa-lock" aria-hidden="true"></i>

            <h3> Sign Up </h3>
              <br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name *" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label> -->

                            <div class="col-md-6">
                                <input id="name" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address *" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-6">
                                <input id="name" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password *" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-md-6">
                                <input id="name" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password *" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">

                                <button type="submit" id="signup-btn"class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                        </div>

                        <div id ="signup" onClick="togglePage('login','register')">Already have an account? <a style="color:white;"href = "#">Sign In </a></div>


                    </form>




        </div>
    </div>

 


    <div class="login">
        <div class="form">
          <i class="fa fa-sign-in" aria-hidden="true"></i>
            <h3>Sign In</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label> -->

                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address*" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                                <div class="col-md-6">
                                    <input id="name" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password* " required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">

                                    <button id="logbtn" type="submit"  class="btn btn-success">
                                        {{ __('Sign in') }} 
                                    </button>



                            </div>

                             <!-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                            @endif -->

                            <div id ="login" onClick= "togglePage('register','login')"> New User ? <a style="color:white;"href = "#">Sign Up</a></div>

                        </form>

        </div>
    </div>

</div>

@endsection
