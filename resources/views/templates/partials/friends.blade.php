<div class="Friend">
	<a class="pull-left" href="{{ route('profile.index', $user['id']) }}">
	    <img class="media-object profile-img mbotpad10" alt="" 
	    src="@if(!$user['profile_img']) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $user['profile_img'] }} @endif" width="100">
	</a>
	<div><span>{{$user->getName()}}</span></div>	
</div>
