@extends('templates.default')

@section('content')
	<div class="col-lg-3">
		<h3>vriendsschaps verzoeken</h3>
	</div>

	<div class="col-lg-9">
		<h1>Vrienden</h1>
			@foreach ($profile->friends() as $user)
	            @include('templates/partials/friends')				
	        @endforeach
	</div>
@stop