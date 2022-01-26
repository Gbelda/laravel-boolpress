@extends('layouts.admin')
@section('content')
    <h1>Products</h1>
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
                    <td>view | edit | delete</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
