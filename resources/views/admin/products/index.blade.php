@extends('layouts.admin')
@section('content')
    <div class="content_header d-flex justify-content-between">
        <h1>Products</h1>
        <a name="" id="" class="btn btn-dark h-75" href="{{ route('admin.products.create') }}" role="button">ADD
            PRODUCT</a>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td class="w-50">{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}">view</a> |
                        <a href="#">edit</a> |
                        <a href="#"> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}

@endsection
