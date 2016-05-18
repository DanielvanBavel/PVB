@extends('templates.default')

@section('content')
    <div class="col-lg-12 mbottom60">
        <img alt="" class="ProfileBanner" src="http://rockstartemplate.com/design/Blue_glossy_Background.jpg" 
        width="100%" height="200">

        <img class="ProfileImg" src="{{ $profile->profile_img }}" width="150" height="150">
    </div>
        <div class="col-lg-3">
            <h3>Info</h3>
            <div class="Userinfo Block">
                <span>Naam: {{ $profile->getName() }}</span>
                <span>Adres: {{ $profile->adres }}</span>
                <span>Postcode: {{ $profile->zipcode }}</span>
                <span>Woonplaats: {{ $profile->place }}</span>
                <span>Provincie: {{ $profile->province }}</span>
                <span>Telefoon nummer: {{ $profile->phonenumber }}</span>

                @if($profile->id === Auth::id())
                     <a class="btn btn-primary" href="{{ route('profile.edit')}}">Bewerk profiel</a>
                @endif               
            </div>

            <div class="pictures">
                <h3>Foto's</h3>
                <div class="fotoBlock">
                    <div class="row">
                        <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    </div>
                </div>
                @if($profile->id === Auth::id())
                    <a class="btn btn-primary mtop15" href="{{ route('profile.edit')}}">Upload foto's</a>
                @endif
            </div>

            <div class="friends mtop30 mbottom30">
                <h3>Mijn vrienden</h3>
                @if(!$profile->friends()->count())
                    <span>Helaas u heeft nog geen vrienden</span>
                @else            
                    @foreach ($profile->friends(0, 9) as $user)
                        @include('templates/partials/friends')
                    @endforeach
                    <a class="SeeAll" <a href="{{route('profile.friends', $profile->id )}}">Klik hier voor volledige vriendenlijst</a>
                @endif
            </div>
        </div>

    <div class="col-lg-9 posts">
        <h3>Geplaatste berichten</h3>
    </div> 
@stop