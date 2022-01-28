@extends('layouts.app')
@section('content')
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Products</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-5 justify-content-center">
            @foreach ($products as $product)
                <div class="feature col border g-4 shadow mx-2">
                    <div>
                        <img src="{{ $product->image }}" alt="" class="w-100">
                    </div>
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="icon-link">
                        See product
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
