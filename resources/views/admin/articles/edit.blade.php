@extends('layouts.admin')
@section('content')
    <h1>EDIT ARTICLE</h1>
    <form method="POST" action="{{ route('admin.articles.update', $article->slug) }}">
        @csrf
        @method('PUT')

        <div class="mb-3 form-group">
            <label for="title" class="form-label @error('title') is-invalid @enderror ">TITLE</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
            @error('title')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="image" class="form-label @error('image') is-invalid @enderror">IMAGE URL</label>
            <input type="text" class="form-control" id="image" value="{{ $article->image }}" name="image">
            @error('image')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">CATEGORY</label>
            <select class="form-control" name="category" id="category">
                <option selected disabled>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category', $article->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 form-group">
            <label for="content" class="form-label @error('content') is-invalid @enderror">CONTENT</label>
            <textarea name="content" id="content" rows="10" class="w-100">{{ $article->content }}</textarea>
            @error('content')
                <small>
                    <div class="alert alert-danger">{{ $message }}</div>
                </small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
