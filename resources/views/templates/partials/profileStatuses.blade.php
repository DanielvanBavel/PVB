<div class="row">
    <div class="media Posts">
        <a class="pull-left" href="{{ route('profile.index', ['id' => $status->id]) }}">
            <img class="media-object" alt="{{ Auth::user()->getName() }}" 
                src="@if(!Auth::user()->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ Auth::user()->profile_img }} @endif" width="60">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('profile.index', ['id' => $status->id]) }}">{{ Auth::user()->getName() }}</a></h4>
            <p>{{ $status->body }}</p>
            <ul class="list-inline">
                <li>{{ $profile->created_at->diffForHumans() }}</li>
                @if ($status->id !== Auth::user()->id)
                    <li><a href="{{ route('status.like', ['statusId' => $profile->id]) }}">Like</a></li>
                @endif
                <li></li>
            </ul>

            @foreach ($status->replies as $reply)
                <div class="media">
                    <a class="pull-left" href="{{ route('profile.index', ['id' => $reply->user->id]) }}">
                        <img class="media-object" alt="{{ $reply->user->getName() }}" src="@if(!$reply->user->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $reply->user->profile_img }} @endif" width="60">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading"><a href="{{ route('profile.index', ['id' => $reply->user->id]) }}">{{ $reply->user->getName() }}</a></h5>
                        <p>{{ $reply->body }}</p>
                        <ul class="list-inline">
                        <li>{{ $reply->created_at->diffForHumans() }}</li>
                           @if ($reply->user->id !== Auth::user()->id)
                                <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
                            @endif
                            <li></li>
                        </ul>
                    </div>
                </div>
            @endforeach

            <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
            <div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error': '' }}">
                <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" 
                    placeholder="Geef een reactie op dit bericht"></textarea>
                @if ($errors->has("reply-{$status->id}"))
                    <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                @endif
                </div>
                <input type="submit" value="Plaats reactie" class="btn btn-default btn-sm">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>