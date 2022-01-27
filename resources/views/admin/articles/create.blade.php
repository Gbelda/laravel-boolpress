@extends('layouts.admin')
@section('content')
    <h1>NEW ARTICLE</h1>
    <form method="POST" action="{{ route('admin.articles.store') }}">
        @csrf

        <div class="mb-3 form-group">
            <label for="title" class="form-label @error('title') is-invalid @enderror ">TITLE</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Insert article title"
                value="{{ old('title') }}">
            @error('title')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="image" class="form-label @error('image') is-invalid @enderror">IMAGE URL</label>
            <input type="text" class="form-control" id="image" placeholder="https://" value="{{ old('image') }}"
                name="image">
            @error('image')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="content" class="form-label @error('content') is-invalid @enderror">CONTENT</label>
            <textarea name="content" id="content" rows="10" class="w-100">{{ old('content') }}</textarea>
            @error('content')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
