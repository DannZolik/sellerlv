@include('header', ['pageTitle' => 'Create advert'])
<body>

@include('navbar')

<div class="container">

    <div class="panel panel-primary card mt-5">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="panel-heading text-center mt-4">
            <h2>Post new advertisement</h2>
        </div>

            <div class="panel-body card-body">
                <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('adverts.post.create') }}" >
                    @csrf
                    <div class="mb-3">
                        <label for="categoryID" class="form-label">Category</label>
                        <select class="form-select" name="categoryID" id="categoryID">
                            <option value=""></option>
                            @foreach($allCategories as $value)
                                <option value="{{$value['id']}}" {{ (old('categoryID') ?? null) == $value['id'] ? 'selected' : '' }}>{{$value['value']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" step="0.01" min="0" id="price" name="price" placeholder="Enter price" value="{{ old('price') }}">
                        @error('price')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="h5">Image</label>
                        <input type="file" name="image" id="product_image" placeholder="Choose image">
                        @error('image')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: #34c3a0; border-color:#34c3a0" >Submit</button>
                </form>
            </div>



    </div>

</div>

</body>

@include('footer')

</html>
