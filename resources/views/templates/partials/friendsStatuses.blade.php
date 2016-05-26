<div class="row">
    <div class="media Posts">
        <a class="pull-left" href="{{ route('profile.index', ['id' => $profile->id]) }}">
            <img class="media-object" alt="{{ $profile->getName() }}" 
                src="@if(!$profile->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $profile->profile_img }} @endif" width="60">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('profile.index', ['id' => $status->id]) }}">{{ 
                $profile->getName() }}</a></h4>
            <p>{{ $status->body }}</p>
            <ul class="list-inline">
                <li>{{ $profile->created_at->diffForHumans() }}</li>
                @if ($status->id !== $profile->id)
                    <li><a href="{{ route('status.like', ['statusId' => $profile->id]) }}">Like</a></li>
                @endif
                <li>{{ $status->likes->count() }} {{ str_plural('Like', $status->likes->count()) }}</li>
            </ul>

            @foreach ($status->replies as $reply)                           
                <div class="media">
                    <a class="pull-left" href="{{ route('profile.index', ['id' => $reply->id]) }}">
                        <img class="media-object" alt="" src="@if(!$reply->user->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $reply->user->profile_img }} @endif" width="60">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading"><a href="{{ route('profile.index', ['id' => $reply->user_id]) }}">{{ $reply->user->getName() }}</a></h5>
                        <p>{{ $reply->body }}</p>
                        <ul class="list-inline">
                        <li>{{ $reply->created_at->diffForHumans() }}</li>
                           @if ($reply->user->id !== $profile->id)
                                <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
                            @endif
                            <li>{{ $reply->likes->count() }} {{ str_plural('Like', $reply->likes->count()) }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
            
            @if(Auth::user()->isFriendsWith($profile))
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
            @else
                <p><strong>U kunt niet reageren op deze reactie, omdat u nog geen vrienden bent met deze gebruiker</strong></p>
            @endif
        </div>
    </div>
</div>