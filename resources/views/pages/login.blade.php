@extends('layouts.clear')

@section('form')
    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel" style="background: #ffffff !important;">
            <div class="panel-body bg-light">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">PF Login</h1>
                    <p>Sign In to your account</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" placeholder="Emailaddress" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="form-checkbox" class="magic-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="form-checkbox">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
    <!--===================================================-->
@endsection