@extends('templates.default')

@section('content')
    <h3>Update je profiel</h3>

    <div class="row">
        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{ route('profile.edit') }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error': '' }}">
                            <label for="firstname" class="control-label">Voornaam</label>
                            <input type="text" name="firstname" class="form-control" 
                                value="{{ Auth::user()->getFirstname() }}">
                            @if ($errors->has('firstname'))
                                <span class="help-block">{{ $errors->first('firstname') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error': '' }}">
                            <label for="lastname" class="control-label">Achternaam</label>
                            <input type="text" name="lastname" class="form-control"
                             value="{{  Auth::user()->getLastname() }}">
                            @if ($errors->has('lastname'))
                                <span class="help-block">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('adres') ? ' has-error': '' }}">
                    <label for="adres" class="control-label">Adres</label>
                    <input type="text" name="adres" class="form-control" value="{{ Auth::user()->GetAddress() }}">
                    @if ($errors->has('adres'))
                        <span class="help-block">{{ $errors->first('adres') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('zipcode') ? ' has-error': '' }}">
                    <label for="zipcode" class="control-label">Postcode</label>
                    <input type="text" name="zipcode" class="form-control" value="{{ Auth::user()->GetZipcode() }}">
                    @if ($errors->has('zipcode'))
                        <span class="help-block">{{ $errors->first('zipcode') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('place') ? ' has-error': '' }}">
                    <label for="place" class="control-label">Woonplaats</label>
                    <input type="text" name="place" class="form-control" value="{{ Auth::user()->GetPlace() }}">
                    @if ($errors->has('place'))
                        <span class="help-block">{{ $errors->first('place') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('province') ? ' has-error': '' }}">
                    <label for="province" class="control-label">Provincie</label>
                    <input type="text" name="province" class="form-control" value="{{ Auth::user()->GetProvince() }}">
                    @if ($errors->has('province'))
                        <span class="help-block">{{ $errors->first('province') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error': '' }}">
                    <label for="phonenumber" class="control-label">Telefoon nummer</label>
                    <input type="text" name="phonenumber" class="form-control" value="{{ Auth::user()->GetPhonenumber() }}">
                    @if ($errors->has('phonenumber'))
                        <span class="help-block">{{ $errors->first('phonenumber') }}</span>
                    @endif
                </div>


















                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@stop