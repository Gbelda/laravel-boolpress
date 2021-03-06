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

    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
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
                    <td class="col">
                        <a href="{{ route('admin.products.show', $product->id) }}" class="pb-1">view</a> |
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="pb-1">edit</a> |
                        <!-- Button trigger modal -->
                        <a href="#">
                            <button class="btn btn-link p-0 pb-1" data-bs-toggle="modal"
                                data-bs-target="#delete_{{ $product->id }}">
                                delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete_{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete {{ $product->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-danger">
                                            Warning! This product will be permanently deleted! are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}

@endsection
