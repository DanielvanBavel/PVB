<div class="center">
	<div class="media height80 lineBottom">
	    <a class="pull-left" href="{{ route('profile.index', $user->id) }}">
	        <img class="media-object profile-img" alt="{{ $user->getName() }}" src="{{ $user->getProfileImg() }}" width="60">
	    </a>
	    <div class="media-body">
	        <h4 class="search-title">
	        	<a href="{{ route('profile.index', $user->id) }}">{{ $user->getName() }}</a>
	        </h4>
	        @if ($user->place)
	            <p>{{ $user->place }}</p>
	        @endif

	        <a class="btn btn-primary fl-r btnFixMar">Vriend toevoegen</a>
	    </div>
	</div>
</div>