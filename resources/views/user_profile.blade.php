@include('header', ['pageTitle' => 'User Profile | Seller.lv'])

<style>
    .btn-orange {
        background-color: #f97316; /* Assuming $orange-500 is this color */
        color: white;
    }
    .btn-orange:hover {
        background-color: #ea580c; /* Darker shade for hover */
    }
</style>

<body>

@include('navbar')

<div class="content mt-5 ms-0">
    <!-- Main content -->
    <div class="container mt-0">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
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
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">User Profile</h5>
                            </div>

                            <div class="col-6 text-end">
                                <button class="btn btn-primary" style="background-color: #34c3a0; border-color:#34c3a0" data-bs-toggle="modal" data-bs-target="#myAdvertsModal">
                                    My adverts</button>
                            </div>

                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="myAdvertsModal" tabindex="-1" aria-labelledby="myAdvertsModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myAdvertsModalLabel">My adverts</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#myAdvertsModal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mt-1 row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
                                            @foreach($userAdverts as $advert)
                                                <div class="col">
                                                    <div class="card h-100 d-flex flex-column card-hover">
                                                        <div data-bs-toggle="modal" data-bs-target="#advertModal{{$advert->id}}">
                                                            <div class="ratio ratio-4x3">
                                                                <img src="{{ asset($advert->image) }}" class="card-img-top p-1" alt="{{$advert->image}}">
                                                            </div>

                                                            <div class="card-body d-flex flex-column">
                                                                <h5 class="card-title">{{$advert->title}}</h5>
                                                                <p class="card-text">{{$advert->description}}</p>
                                                                <div class="mt-auto">
                                                                    <p class="card-text">€ <span class="fw-bold">{{$advert->price}}</span></p>
                                                                    <p class="card-text"><small class="text-muted">{{date("Y-m-d", strtotime($advert->created_at))}}</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer mt-auto p-1">
                                                            <div class="d-flex">
                                                                <button class="btn btn-sm btn-danger flex-grow-1 me-1">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-warning flex-grow-1 ms-1">
                                                                    <i class="bi bi-pencil"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!-- Modal -->

                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($userAdverts as $advert)
                            <div class="modal fade" id="advertModal{{$advert->id}}" tabindex="-1" aria-labelledby="advertModalLabel{{$advert->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="advertModalLabel{{$advert->id}}">{{$advert->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#advertModal{{$advert->id}}" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-0 col-md-2">

                                                            </div>
                                                            <div class="col-12 col-md-8">
                                                                <div class="ratio ratio-4x3">
                                                                    <img src="{{ asset($advert->image) }}" class="" alt="{{$advert->image}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-0 col-md-2">

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-12 mt-2 mt-md-3">
                                                        <label for="product_name_{{$advert->id}}" class="h5">Title</label>
                                                        <p class="" id="product_name_{{$advert->id}}">{{$advert->title}}</p>

                                                        <label for="product_description_{{$advert->id}}" class="h5">Description</label>
                                                        <p class="" id="product_description_{{$advert->id}}">{{$advert->description}}</p>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <label for="product_price_{{$advert->id}}" class="h5">Price</label>
                                                                <p class="" id="product_price_{{$advert->id}}">€ <span class="fw-bold h3">{{$advert->price}}</span></p>
                                                            </div>
                                                            <div class="col-12 col-md-6">

                                                                @php
                                                                    $email = null;
                                                                    $phone = null;
                                                                    $web = null;
                                                                    foreach ($advert->user->userData as $userData){
                                                                        switch ($userData->userDataType['value']){
                                                                            case 'email':
                                                                                $email = $userData['value'];
                                                                                break;
                                                                            case 'phone':
                                                                                $phone = $userData['value'];
                                                                                break;
                                                                            case 'web':
                                                                                $web = $userData['value'];
                                                                                break;
                                                                        }
                                                                    }
                                                                @endphp

                                                                @if(isset($email))
                                                                    <p class="mb-1"><small class="text-muted">E-mail: {{$email}}</small></p>
                                                                @endif
                                                                @if(isset($phone))
                                                                    <p class="mb-1"><small class="text-muted">Phone number: {{$phone}}</small></p>
                                                                @endif
                                                                @if(isset($web))
                                                                    <p class="mb-1"><small class="text-muted">Web: <a href="#">{{$web}}</a></small></p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
                            <button type="submit" class="btn btn-primary" style="background-color: #34c3a0; border-color:#34c3a0">Save Changes</button>
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
