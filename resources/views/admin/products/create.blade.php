@extends('layouts.admin')
@section('content')
    <h1>NEW PRODUCT</h1>
    <form method="POST" action="#">
        <div class="mb-3">
            <label for="name" class="form-label">NAME</label>
            <input type="text" class="form-control" id="name" placeholder="Insert Product name"
                value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">IMAGE URL</label>
            <input type="text" class="form-control" id="image" placeholder="https://" value="{{ old('image') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">PRICE</label>
            <input type="text" class="form-control" id="price" placeholder="Insert Price amount"
                value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">DESCRIPTION</label>
            <textarea name="description" id="description" rows="10"
                class="w-100">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
