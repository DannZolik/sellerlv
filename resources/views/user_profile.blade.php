{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>User Profile | Seller.lv</title>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
{{--    <style>--}}
{{--        /* Add your custom styles here */--}}
{{--        /* Sidebar */--}}
{{--        .sidebar {--}}
{{--            position: fixed;--}}
{{--            top: 0;--}}
{{--            bottom: 0;--}}
{{--            left: 0;--}}
{{--            z-index: 100;--}}
{{--            padding: 48px 0;--}}
{{--            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);--}}
{{--            background-color: #f8f9fa;--}}
{{--        }--}}
{{--        /* Content */--}}
{{--        .content {--}}
{{--            margin-left: 250px; /* Width of sidebar */--}}
{{--            padding: 20px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

@include('header', ['pageTitle' => 'User Profile | Seller.lv'])

<body>

@include('navbar')



{{--<!-- Sidebar -->--}}
{{--<div class="sidebar">--}}
{{--    <div class="container">--}}
{{--        <!-- Sidebar links -->--}}
{{--        <ul class="nav flex-column">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Products</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Categories</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Contact</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="content mt-5 ms-0">
    <!-- Main content -->
    <div class="container mt-0">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
{{--                        {{json_encode($userData)}}--}}
                        @php
                            $email = null;
                            $email_private = null;
                            $phone = null;
                            $phone_private = null;
                            $web = null;
                            $web_private = null;

                            foreach ($userData as $value){
                                switch ($value->userDataType['value']){
                                    case 'email':
                                        $email = $value['value'];
                                        $email_private = $value['isPrivate'];
                                        break;
                                    case 'phone':
                                        $phone = $value['value'];
                                        $phone_private = $value['isPrivate'];
                                        break;
                                    case 'web':
                                        $web = $value['value'];
                                        $web_private = $value['isPrivate'];
                                        break;
                                }
                            }
                        @endphp
                        <h5 class="card-title">User Profile</h5>
                        <form method="POST" action="{{ route('users.update', $user['id'] ?? 0) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $user['name'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $email ?? '' }}">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="email_private" id="email_private" class="me-1" {{$email_private ? 'checked':''}}>
                                        <label class="form-check-label" for="email_private">Private</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" value="{{ $phone ?? '' }}">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="phone_private" id="phone_private" class="me-1" {{$phone_private ? 'checked':''}}>
                                        <label class="form-check-label" for="phone_private">Private</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="web" class="form-label">Web page</label>
                                <div class="input-group">
                                    <input type="text" name="web" class="form-control" id="web" placeholder="Enter website" value="{{ $web ?? '' }}">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="web_private" id="web_private" class="me-1" {{$web_private ? 'checked':''}}>
                                        <label class="form-check-label" for="web_private">Private</label>
                                    </div>
                                </div>
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
@include('footer')

</html>
