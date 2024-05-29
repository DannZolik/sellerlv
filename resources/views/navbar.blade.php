<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid ms-1">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}"><img src="/logo.png" alt="Logo" height="30"></a>
        <!-- Navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse me-5" id="navbarNav">

            <ul class="navbar-nav ms-auto mt-3 mt-lg-0">
                <form class="d-flex me-5">
                    <input class="form-control me-2" type="search" placeholder="I'm searching for..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adverts.create')}}">Post advertisement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Favorites</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse me-5" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <div class="dropdown dropstart">
                        <button class="btn dropdown-toggle" type="button" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xl text-small px-2" aria-labelledby="dropdownUser1">
                            @if(isset($authUser))
                                <li class="">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-center align-items-center border border-2 border-dark rounded-circle me-2 h-100" style="width: 40px;">
                                            <i class="bi bi-person-fill fs-4"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold">{{ $authUser['name'] }}</span>
                                            <br>
                                            <span>{{ $authUser['email'] }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('users.profile', $authUser['id']) }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            @else
                                <li>
                                    <div class="" role="group" aria-label="Login and Signup Buttons">
                                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2" style="background-color: #34c3a0; border-color:#34c3a0">
                                            {{ __('Login') }}
                                        </a>
                                        <a href="{{ route('signup') }}" class="btn btn-outline-secondary w-100">
                                            {{ __('Sign up') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="visibility: hidden;">
    <div class="container-fluid ms-1">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}"><img src="/logo.png" alt="Logo" height="30"></a>
        <!-- Navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse me-5" id="navbarNav">

            <ul class="navbar-nav ms-auto mt-3 mt-lg-0">
                <form class="d-flex me-5">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Post advertisement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Favorites</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse me-5" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="{{ route('home') }}">Home</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="#">Post advertisement</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="#">Favorites</a>--}}
                {{--                </li>--}}
                <li class="nav-item">
                    <div class="dropdown dropstart">
                        <button class="btn dropdown-toggle" type="button" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xl text-small px-2" aria-labelledby="dropdownUser1">
                            @if(isset($authUser))
                                <li class="">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-center align-items-center border border-2 border-dark rounded-circle me-2 h-100" style="width: 40px;">
                                            <i class="bi bi-person-fill fs-4"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold">{{ $authUser['name'] }}</span>
                                            <br>
                                            <span>{{ $authUser['email'] }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('users.profile', $authUser['id']) }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            @else
                                <li>
                                    <div class="" role="group" aria-label="Login and Signup Buttons">
                                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">
                                            {{ __('Login') }}
                                        </a>
                                        <a href="{{ route('signup') }}" class="btn btn-outline-secondary w-100">
                                            {{ __('Sign up') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
