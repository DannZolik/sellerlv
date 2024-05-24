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
    <div class="container mt-2 pt-2">
        <div class="d-flex align-items-center justify-content-center">
            <h1 class="text-gray-800">Categories</h1>

        </div>

        <!-- Your content goes here -->
        <div class="row mt-1 row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
            @foreach($categories as $category)
                <div class="col">
                    <a href="{{route('category-show', $category->route)}}" style="text-decoration: none;">
                        <div class="card shadow-sm">
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f3f3f3;">
                                <div class="text-center" style="width: 100%; padding: 10px;">
                                    <i class="{{$category->image}}" style="font-size: 2rem; color: #34c3a0; "></i>
                                    <div class="mt-1" style="color: #34c3a0; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        {{$category->value}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>





            @endforeach
{{--            @for($i = 0; $i < 12; $i++)--}}
{{--                <div class="col">--}}
{{--                    <div class="card shadow-sm">--}}
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="true">--}}
{{--                            <title>Placeholder</title>--}}
{{--                            <rect width="100%" height="100%" fill="#f3f3f3"></rect>--}}
{{--                            <text class="" x="50%" y="50%" fill="#34c3a0" dy=".3em" dx="-2.5em">Thumbnail</text>--}}
{{--                        </svg>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @endfor--}}



        </div>

    </div>
</div>

<!-- Bootstrap JS (optional) -->

</body>
@include('footer')
</html>
