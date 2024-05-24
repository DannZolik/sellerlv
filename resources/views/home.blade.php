@include('header', ['pageTitle' => 'Home'])

<body>

@include('navbar')

<!-- Sidebar -->
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

<!-- Page content -->
<div class="content ms-0">
    <!-- Main content -->
    <div class="container mt-5">
        <div class="row mt-5 row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
            @for($i = 0; $i < 12; $i++)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#f3f3f3"></rect>
                            <text x="50%" y="50%" fill="#34c3a0" dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                </div>
            @endfor



        </div>
        <h1>Welcome to our Online Store!</h1>
        <!-- Your content goes here -->
    </div>
</div>

<!-- Bootstrap JS (optional) -->

</body>
@include('footer')
</html>
