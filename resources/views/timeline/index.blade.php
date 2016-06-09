@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6 center">
            <form role="form" action="{{ route('status.index') }}" method="post">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <textarea placeholder="Wat ben je aan het doen?" 
                    name="status" class="form-control" rows="5" cols="30"></textarea>
                    @if ($errors->has('status'))
                        <span class="help-block">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Plaats nieuw bericht</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 center" id="loadMessage">
            @if (!$statuses->count())
                <p id="errorMsg">Er zijn nog geen geplaatste berichten</p>
            @else 
                @foreach ($statuses as $status)                                 
                    @include('templates/partials/TimelineStatuses')                    
                @endforeach
            @endif
     
           <button onclick='loadMessages("getMoreStatuses")' id="btnLoadMessages" class='btn btn default'>Meer berichten ophalen? </button>
        </div>
    </div>

@stop