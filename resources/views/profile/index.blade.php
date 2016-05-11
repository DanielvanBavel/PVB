@extends('templates.default')

@section('content')
    <div class="col-lg-12">
        <img alt="" src="http://rockstartemplate.com/design/Blue_glossy_Background.jpg" 
        width="100%" height="200">
    </div>
    
    <div class="col-lg-3">
        <h3>Info</h3>
        <div class="Userinfo Block">
            <span>Voornaam: {{ Auth::user()->getFirstname() }}</span>
            <span>Achternaam: {{ Auth::user()->getLastname() }}</span>
            <span>Adres: {{ Auth::user()->getAddress()}}</span>
            <span>Postcode: {{ Auth::user()->getZipcode()}}</span>
            <span>Woonplaats: {{ Auth::user()->getPlace()}}</span>
            <span>Provincie: {{ Auth::user()->getProvince()}}</span>
            <span>Telefoon nummer: {{ Auth::user()->getPhoneNumber()}}</span>

            <a class="btn btn-primary" href="{{ route('profile.edit')}}">Bewerk profiel</a>
        </div>

        <div class="pictures">
            <h3>Foto's</h3>
            <div class="fotoBlock">
                <div class="row">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                </div>
                <div class="row">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                </div>
                <div class="row">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                    <img alt="" src="http://www.priorlakeassociation.org/wp-content/uploads/2011/06/blank-profile.png" width="65" height="">
                </div>
            </div>
            <a class="btn btn-primary mtop15" href="{{ route('profile.edit')}}">Upload foto's</a>
        </div>
    </div>

    <div class="col-lg-9 posts">
        <h3>Geplaatste berichten</h3>
    </div>    
@stop