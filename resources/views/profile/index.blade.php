@extends('templates.default')

@section('content')
    <div class="col-lg-12 mbottom60">
        <img alt="" class="ProfileBanner" src="http://rockstartemplate.com/design/Blue_glossy_Background.jpg" 
        width="100%" height="200">

        <img class="ProfileImg" src="@if(!$profile->profile_img) {{ URL::to('/') }}/images/users/profile-img.jpg  @else {{ $profile->profile_img }} @endif" width="150" height="150">
    </div>
        <div class="col-lg-3">
            <h3>Info</h3>
            <div class="Userinfo Block">
                <span>Naam: {{ $profile->getName() }}</span>
                @if(!$profile->adres == '')
                    <span>Adres: {{ $profile->adres }}</span>
                @endif
                @if(!$profile->zipcode == '')
                    <span>Postcode: {{ $profile->zipcode }}</span>
                @endif
                @if(!$profile->place == '')
                    <span>Woonplaats: {{ $profile->place }}</span>
                @endif
                @if(!$profile->province == '')
                    <span>Provincie: {{ $profile->province }}</span>
                @endif
                @if(!$profile->phonenumber == '')
                    <span>Telefoon nummer: {{ $profile->phonenumber }}</span>
                @endif

                @if($profile->id === Auth::id())
                     <a class="btn btn-primary" href="{{ route('profile.edit')}}">Bewerk profiel</a>
                @endif               
            </div>

            <!-- <div class="pictures">
                <h3>Foto's</h3>
                <div class="fotoBlock">
                    <div class="row">
                        <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    </div>
                </div>
               {{-- @if($profile->id === Auth::id())
                    <a class="btn btn-primary mtop15" href="{{ route('profile.edit')}}">Upload foto's</a>
                @endif--}}
            </div> -->

            <div class="friends mtop30 mbottom30">
                @if($profile->id === Auth::id())
                    <h3>Mijn vrienden</h3>                    
                    @else
                     <h3>{{$profile->firstname}}'s Vrienden</h3>   
                    @endif
                @if(!$profile->friends()->count())
                    <span>Helaas, u heeft nog geen vrienden</span>
                @else                   
                    @foreach (array_slice($profile->friends()->toArray(), 0, 9) as $user)
                        @include('templates/partials/friends')                     
                    @endforeach
                    <a class="SeeAll" <a href="{{route('profile.friends', $profile->id )}}">Klik hier voor volledige vriendenlijst</a>
                @endif
            </div>
            
            @if($profile->id === Auth::id())
            <div class="LetSomeoneHelpMe">
                <h3>Vraag hulp</h3>
                <a href="{{ route('auth.askHelp')}}">Vraag hulp aan een bekende om mij te helpen met mijn account</a>
            </div>
            @endif
            
            @if($profile->id !== Auth::id())
               @if(Auth::user()->isFriendsWith($user))
                    <span>je bent al vrienden met deze gebruiker</span>                    
                @else
                    <div class="friends">
                        <h3>voeg vriend toe</h3>
                        <a class="btn btn-primary addFriendBtn" href="{{route('friends.add', $profile->id)}}">Vriend toevoegen
                        </a>
                    </div>
                @endif
            @endif
        </div>

    <div class="col-lg-9 posts">
        <h3>Mijn geplaatste berichten</h3>  
            @if ($profile->id === Auth::id()){{-- Statusen van de ingelogde gebruiker --}}
                @if(!$statuses->count() )
                    <p>Je hebt nog geen berichten geplaatst.</p>
                @else 
                    @foreach ($statuses as $status)         
                        @include('templates/partials/profileStatuses')
                    @endforeach
                @endif
            @else
                @if($profile->statuses->count() === 0 )
                    <p>Deze gebruiker heeft nog geen bericht geplaatst.</p>
                @else 
                    @foreach ($profile->statuses->sortBy('created_at') as $status)         
                        @include('templates/partials/friendsStatuses')
                    @endforeach
                @endif
            @endif                  
    </div> 
@stop