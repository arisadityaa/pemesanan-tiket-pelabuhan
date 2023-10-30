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
                    <a class="nav-link {{ request()->is('location*') ? ' active' : ' ' }}" href="/location">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('ticket*') ? ' active' : ' ' }}" href="/ticket">Ticket</a>
                </li>
            @endauth
            @can('member')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('boking*') ? ' active' : ' ' }}" href="/boking">Bokings</a>
                </li>
            @endcan
            @can('employe')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('employe*') ? ' active' : ' ' }}" href="/employe">Employe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sail*') ? ' active' : ' ' }}" href="/sail">Sail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('lsit-sail*') ? ' active' : ' ' }}" href="/lsit-sail">User List
                        Sails</a>
                </li>
            @endcan
        </ul>

        @auth
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="mb-2">
                        <a class="btn bg-light mr-2" href="/user/{{ Auth::user()->id }}"><i class="fa-regular fa-user"></i>
                            {{ Auth::user()->name }}</a>
                    </li>
                    <li class="mb-2">
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
