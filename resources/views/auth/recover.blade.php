@extends('templates.default')

@section('content')
<div class="center">
    <h3>Herstel het wachtwoord</h3>
    <div class="row">
        <div class="col-lg-8">
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.login') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Vraag wachtwoord op?</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@stop