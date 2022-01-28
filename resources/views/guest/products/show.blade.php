@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ $product->image }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">{{ $product->name }}</h1>
                <p class="lead">{{ $product->description }}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <h4>
                        &euro;{{ $product->price }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection
