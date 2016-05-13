@extends('templates.default')

@section('content')
<div class="center">
    <h3>Registreren</h3>    
    <div class="row">
        <div class="col-lg-8">
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.register') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email Adres</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Wachtwoord</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                    <label for="birthdate" class="control-label">Geboortedatum</label>
                    <input type="text" pattern="\d{1,2}-\d{1,2}-\d{4}" name="birthdate" class="form-control" id="birthdate" placeholder="DD-MM-YYYY" value="{{ Request::old('birthdate') ?: '' }}">
                    @if ($errors->has('birthdate'))
                        <span class="help-block">{{ $errors->first('birthdate') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label for="firstname" class="control-label">Voornaam</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" value="{{ Request::old('firstname') ?: '' }}">
                    @if ($errors->has('firstname'))
                        <span class="help-block">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="lastname" class="control-label">Achternaam</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" value="{{ Request::old('lastname') ?: '' }}">
                    @if ($errors->has('lastname'))
                        <span class="help-block">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Registeer nu</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@stop