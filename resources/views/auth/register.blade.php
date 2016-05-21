@extends('templates.default')

@section('content')
<div style="position: relative; display: block; margin-left: 15%;">
    <h3>Registreren</h3>    
    <div class="row">
        <div class="col-lg-12">
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.register') }}">
                <div class="col-lg-5">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Email Adres</label>
                        <input type="text" name="email" class="form-control" value="{{ Request::old('email') ?: '' }}">
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
                    
                    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                        <label for="birthdate" class="control-label">Geboortedatum</label>
                        <input type="text" pattern="\d{1,2}-\d{1,2}-\d{4}" name="birthdate" class="form-control" placeholder="DD-MM-YYYY" value="{{ Request::old('birthdate') ?: '' }}">
                        @if ($errors->has('birthdate'))
                            <span class="help-block">{{ $errors->first('birthdate') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label for="firstname" class="control-label">Voornaam</label>
                        <input type="text" name="firstname" class="form-control" value="{{ Request::old('firstname') ?: '' }}">
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
                </div>

                <div class="col-lg-5">
                    <div class="form-group{{ $errors->has('adres') ? ' has-error' : '' }}">
                        <label for="adres" class="control-label">Adres</label>
                        <input type="text" name="adres" class="form-control" value="{{ Request::old('adres') ?: '' }}">
                        @if ($errors->has('adres'))
                            <span class="help-block">{{ $errors->first('adres') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('Zipcode') ? ' has-error' : '' }}">
                        <label for="Zipcode" class="control-label">Postcode</label>
                        <input type="text" name="Zipcode" class="form-control" value="{{ Request::old('Zipcode') ?: '' }}">
                        @if ($errors->has('Zipcode'))
                            <span class="help-block">{{ $errors->first('Zipcode') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                        <label for="place" class="control-label">Plaats</label>
                        <input type="text" name="place" class="form-control" value="{{ Request::old('place') ?: '' }}">
                        @if ($errors->has('place'))
                            <span class="help-block">{{ $errors->first('place') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                        <label for="province" class="control-label">Provincie</label>
                        <input type="text" name="province" class="form-control" value="{{ Request::old('province') ?: '' }}">
                        @if ($errors->has('province'))
                            <span class="help-block">{{ $errors->first('province') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                        <label for="phonenumber" class="control-label">Telefoonnummer</label>
                        <input type="text" name="phonenumber" class="form-control" value="{{ Request::old('phonenumber') ?: '' }}">
                        @if ($errors->has('phonenumber'))
                            <span class="help-block">{{ $errors->first('phonenumber') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="float: left;
    position: relative;
    display: block;
    width: 100%;">
                    <button type="submit" class="btn btn-default" style="    float: left;
    width: 20%;
    margin-left: 32%;
">Registeer nu</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@stop