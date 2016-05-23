<div class="center">
	<div class="media height80 lineBottom">
	    <a class="pull-left" href="{{ route('profile.index', $user->id) }}">
	        <img class="media-object profile-img" alt="{{ $user->getName() }}" src="@if(!$user->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $user->profile_img }} @endif" width="60">
	    </a>
	    <div class="media-body">
	        <h4 class="search-title">
	        	<a href="{{ route('profile.index', $user->id) }}">{{ $user->getName() }}</a>
	        </h4>
	        @if ($user->place)
	            <p>{{ $user->place }}</p>
	        @endif
			
			@if(Auth::user()->isFriendsWith($user))
				<span class="ifFriends">Al vrienden</span>
			@elseif(Auth::id() === $user->id)
				{{-- Link naar eingen profiel ofso --}}
			@else 
				<a class="btn btn-primary addFriendBtn" href="{{route('friends.add', $user->id)}}">			Vriend toevoegen
		        </a>
			@endif	        
	    </div>
	</div>
</div>