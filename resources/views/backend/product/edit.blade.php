@extends('backend.master')

@section('content')
    <section class="p-3">
        <h1 class="text-center mb-3">Edit Product</h1>
        <h3 class="text-center text-success mb-3"></h3>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $product->title }}" placeholder="Give a Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="desc" value="{{ $product->desc }}" placeholder="Give a Product Description">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $product->price }}" placeholder="Give a Price">
            </div>
            <div class="mb-3">
                <img src="{{asset('/')}}{{ $product->image }}" alt="product-image" height="100px" width="100px">
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </section>
@endsection