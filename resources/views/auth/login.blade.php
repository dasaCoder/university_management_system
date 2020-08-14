@extends('layouts.auth')

@section('content')

<style>
    .invalid-feedback{
        display: block;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 login-wrap">
            <div class="login-content">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>
                            <input id="password" type="password" class="au-input au-input--full @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="login-checkbox">
                            <label>
                                <input type="checkbox" name="remember"name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                            </label>
                            @if (Route::has('password.request'))
                                <label>
                                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </label>
                            @endif
                        </div>

                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
