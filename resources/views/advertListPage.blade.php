@include('header', ['pageTitle' => 'Adverts'])

<style>
    .card-text {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-title{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-hover {
        cursor: pointer;
    }
    a {
        color: inherit;
    }

</style>

<body>

@include('navbar')

<div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
            <div class="p-3">
                <form id="filterForm" method="GET" action="{{route('category-show', $category)}}">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="productName" name="name"
                               value="{{$name ?? ''}}" placeholder="Name...">
                    </div>
                    <div class="mb-3">
                        <label for="priceFrom" class="form-label">From, €</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="priceFrom" name="from"
                               value="{{$from ?? ''}}" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label for="priceTo" class="form-label">To, €</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="priceTo" name="to"
                               value="{{$to ?? ''}}" placeholder="10000">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mx-2" style="background-color: #34c3a0; border-color:#34c3a0">
                            <i class="bi bi-funnel me-1"></i>Submit</button>
                        <button type="reset" class="btn btn-secondary mx-2" id="resetFilters">
                            <i class="bi bi-arrow-repeat me-1"></i>Cancel</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<!-- Main layout-->
<div class="content ms-0">
    <button class="btn btn-primary" style="background-color: #34c3a0; border-color:#34c3a0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Filters
    </button>
    <!-- Main content -->
    <div class="container mt-2 pt-2 px-0">

        <!-- Page content -->
        <div class="content flex-grow-1 ms-0 p-1">
            <div class="row mt-1 row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
                @foreach($allAdverts as $advert)
                    <div class="col">
                        <div class="card h-100 d-flex flex-column card-hover" data-bs-toggle="modal" data-bs-target="#advertModal{{$advert->id}}">
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
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="advertModal{{$advert->id}}" tabindex="-1" aria-labelledby="advertModalLabel{{$advert->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="advertModalLabel{{$advert->id}}">{{$advert->title}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <button type="button" class="btn btn-primary" style="background-color: #34c3a0; border-color:#34c3a0" data-bs-dismiss="modal" disabled><i class="bi bi-heart-fill me-1"></i>Add to favourite</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

</body>
<script>
    document.getElementById('resetFilters').addEventListener('click', function() {
        // Reset form fields
        document.getElementById('productName').value = '';
        document.getElementById('priceFrom').value = '';
        document.getElementById('priceTo').value = '';

        // Submit form without any GET data
        document.getElementById('filterForm').action = "{{ route('category-show', $category) }}";
        document.getElementById('filterForm').submit();
    });
</script>
@include('footer')
</html>
