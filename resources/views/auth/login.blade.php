@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 col-xs-10 col-xs-offset-1">
            @if ($errors->has('email'))
                <div class="alert alert-warning">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
            @if ($errors->has('password'))
                <div class="alert alert-warning">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
            <div class="panel panel-default form-login">
                <div class="text-center"><img src="/img/logo.png" alt="logo" width="60px"></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control caja" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control caja" name="password" required placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-left">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-link link-green" href="{{ route('password.request') }}">
                                Perdió su contraseña?
                            </a>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-login">
                                    Log in
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
