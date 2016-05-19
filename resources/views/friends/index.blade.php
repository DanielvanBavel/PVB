@extends('templates.default')

@section('content')
	<div class="col-lg-4">
		<h3>Vriendsschap verzoeken</h3>
		@if (!$requests->count())
			<span>Er zijn geen openstaande vriendsschapverzoeken..</span>
		@else
			@foreach($requests as $user)
				@include('templates.partials.friendsRequests')
			@endforeach
		@endif
	</div>

	<div class="col-lg-8">
		<h1>Mijn Vrienden</h1>
		@foreach ($friends as $user)	
		    @include('templates/partials/friends')				
		@endforeach
	</div>
@stop