<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo.png" class="logo-brand" width="80" height="80" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <ion-icon name="grid-sharp"></ion-icon>
            <i class="icon-screen-smartphone"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="home">
                        <ion-icon name="home-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="portafolio">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="about">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="precio">Precio</a>
                </li>
                @if (Auth::user())
                <form method="POST" action="{{route('logout') }}">
                    @csrf <button type="submit" class="btn btn-secondary">LogOUT</button>
                </form>
                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" id="testimonio">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" id="contacto">Iniciar sesion</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>