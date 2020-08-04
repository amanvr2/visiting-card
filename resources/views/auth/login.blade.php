@extends('layouts.app')

@section('content')

<div class="main">

    <div class="sign-upImage">

      <img src="/images/man-signup.png">

    </div>


    <div class="register">
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

                           

                        </form>

        </div>
      



    </div>
</div>
@endsection
