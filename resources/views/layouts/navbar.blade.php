<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="/location">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ticket">Ticket</a>
                </li>
                @if (Auth::user()->role == 'member')
                    <li class="nav-item">
                        <a class="nav-link " href="/boking">Bokings</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="/employe">Employe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/sail">Sail</a>
                    </li>
                @endif
            @endauth
        </ul>

        @auth
            <div>
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="btn bg-light mr-2"
                            href="/user/{{ Auth::user()->id }}"><i
                                class="fa-regular fa-user"></i> {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a class="btn btn-outline-light" role="button" href="/logout"
                            onclick="return confirm('Are you sure?')"> <i
                                class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    </li>
                </ul>
            </div>
        @endauth

        @guest
            <div>
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="nav-item nav-link active" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        @endguest
    </div>
</nav>
