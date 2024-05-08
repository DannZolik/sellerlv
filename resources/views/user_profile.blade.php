<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Add your custom styles here */
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }
        /* Content */
        .content {
            margin-left: 250px; /* Width of sidebar */
            padding: 20px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container ms-1">
        <!-- Logo -->
        <a class="navbar-brand" href="#"><img src="/logo.png" alt="Logo" height="30"></a>
        <!-- Navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xl text-small px-2" aria-labelledby="dropdownUser1">
                            @if(isset($user))
                                <li class="">
                                    <div class="d-flex align-items-center">
                                        <img src="profile-picture.jpg" alt="Profile Picture" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                                        <div>
                                            <span class="fw-bold">{{$user['name']}}</span>
                                            <br>
                                            <span>{{$user['email']}}</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- Profile Button -->
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('users.profile', $user['id'])}}">Profile</a></li>
                                <!-- Logout Button -->
                                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
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



<!-- Sidebar -->
<div class="sidebar">
    <div class="container">
        <!-- Sidebar links -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</div>

<div class="content mt-5">
    <!-- Main content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="userStatus" class="form-label">Status</label>
                                <select class="form-select" id="userStatus">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="suspended">Suspended</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="userTypeID" class="form-label">User Type</label>
                                <select class="form-select" id="userTypeID">
                                    <option value="1">Type 1</option>
                                    <option value="2">Type 2</option>
                                    <option value="3">Type 3</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
