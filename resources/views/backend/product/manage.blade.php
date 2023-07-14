@extends('backend.master')

@section('content')
    <section class="p-3">
        <h1 class="text-center mb-3">Manage Category</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">#Sl</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{$product->image}}" alt="image" height="50px" width="50px"></td>
                        <td>
                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('product.destroy',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure to delete This Product?')">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </section>
@endsection
