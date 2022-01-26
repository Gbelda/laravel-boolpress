@extends('layouts.admin')
@section('content')
    <h1>EDIT PRODUCT</h1>
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
        @csrf
        @method("PUT")
        <div class="mb-3 form-group">
            <label for="name" class="form-label @error('name') is-invalid @enderror ">NAME</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            @error('name')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="image" class="form-label @error('image') is-invalid @enderror">IMAGE URL</label>
            <input type="text" class="form-control" id="image" value="{{ $product->image }}" name="image">
            @error('image')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="price" class="form-label @error('price') is-invalid @enderror">PRICE</label>
            <input type="text" class="form-control" id="price" value="{{ $product->price }}" name="price">
            @error('price')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="description" class="form-label @error('description') is-invalid @enderror">DESCRIPTION</label>
            <textarea name="description" id="description" rows="10"
                class="w-100">{{ $product->description }}</textarea>
            @error('description')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
