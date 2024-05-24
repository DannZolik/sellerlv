@include('header', ['pageTitle' => 'Adverts'])

<style>
    .card-text {
        display: -webkit-box;
        -webkit-line-clamp: 4; /* Количество строк */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
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
                        <button type="submit" class="btn btn-primary mx-2">
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
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Filters
    </button>
    <!-- Main content -->
    <div class="container mt-2 pt-2">

        <!-- Page content -->
        <div class="content flex-grow-1 ms-3 p-3">
            <div class="row mt-1 row-cols-1 row-cols-sm-3 row-cols-md-4 g-3">
                @foreach($allAdverts as $advert)
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Название продукта">
                            <div class="card-body">
                                <h5 class="card-title">{{$advert->title}}</h5>

                                <p class="card-text">ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p class="card-text">$10.00</p>
                                <p class="card-text"><small class="text-muted">{{date("Y-m-d", strtotime($advert->created_at))}}</small></p>
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
