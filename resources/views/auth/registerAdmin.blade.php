@extends('templates.default')

@section('content')
<div class="center">
    <h3>Registreren als Admin</h3>
    <p>Meld je aan om toegang te krijgen tot de gene zijn account die je heeft uigenodigd per mail, de gene heeft hulp nodig bij zijn profiel.  
    <div class="row">
        <div class="col-lg-8">
            <form class="form-vertical" role="form" method="post" 
                        action="{{ route('auth.create.admin', $activation_code) }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email Adres</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Wachtwoord</label>
                    <input type="password" name="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>    

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Registeer als admin</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@stop