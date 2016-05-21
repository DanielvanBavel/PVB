<div class="friendsRequest">
	<a class="pull-left" href="{{ route('profile.index', $user->id) }}">
	    <img class="media-object profile-img mbotpad10" alt="{{ $user->getName() }}" 
	    src="@if(!$user->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $user->profile_img }} @endif" width="70">
	</a>

	<span>{{$user->getName()}}</span>	
	<a class="btn btn-primary" href="{{ route('friends.accept', $user->id) }}">Accepteren</a>
</div>