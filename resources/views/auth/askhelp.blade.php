@extends('templates.default')

@section('content')
<div class="center">
    <h3>Vraag om hulp</h3>
    <p>Vul een email adres in van een persoon die je je om hulp wil vragen bij het beheren van jou socialmedia account. Dit kan een bekende zijn, of familie. Het enige wat je hoeft te doen is het email adres in te vullen van de persoon wie je om hulp wil vragen. </p>
    <div class="row">
        <div class="col-lg-8">
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.askHelp') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-default">verstuur verzoek</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@stop