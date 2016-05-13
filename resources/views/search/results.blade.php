@extends('templates.default')

@section('content')
    <h3>Je hebt gezocht naar..."{{ Request::input('query') }}"</h3>

    @if (!$users->count())
        <p>Helaas geen resultaten gevonden...</p>
    @else
        <div class="row">
            <div class="col-lg-12">
                @foreach ($users as $user)
                   @include('templates/partials/userblock')
                @endforeach
            </div>
        </div>
    @endif
@stop