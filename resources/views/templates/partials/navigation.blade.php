<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">SocialApp</a>
        </div>
        <div class="collapse navbar-collapse">
            @if (Auth::check())
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">Tijdlijn</a></li>
                    <li><a href="#">Vrienden</a></li>
                    <li><a href="#">Berichten</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="#">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="zoek mensen">
                    </div>
                    <button type="submit" class="btn btn-default">Zoeken</button>
                </form>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li><a href="#">Welkom, {{ Auth::user()->getName() }}</a></li>
                    <li><a href="#">Update profiel</a></li>
                    <li><a href="{{ route('auth.signout') }}">Uitloggen</a></li>
                @else
                    <li><a href="{{ route('auth.register') }}">Registeren</a></li>
                    <li><a href="{{ route('auth.login') }}">Inloggen</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
