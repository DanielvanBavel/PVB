@extends('templates.default')

@section('content')
	<div class="col-lg-12">
		<h1>@if($profile->id === Auth::user()->id) Mijn vrienden @else vrienden van {{$profile->getName()}} @endif </h1>
			@foreach ($profile->friends() as $user)
	            @include('templates/partials/friends')				
	        @endforeach
	</div>
@stop