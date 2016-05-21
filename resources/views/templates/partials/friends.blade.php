<div>
	<a class="pull-left" href="{{ route('profile.index', $user['id']) }}">
	    <img class="media-object profile-img mbotpad10" alt="" 
	    src="@if(!$user['profile_img']) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $user['profile_img'] }} @endif" width="70">
	</a>
</div>
