@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ $article->image }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">

                <div class="tags text-end">
                    tags:
                    @if (count($article->tags) > 0)
                        @foreach ($article->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    @else
                        <span>No tags</span>

                    @endif

                </div>
            </div>
            <div class="col-lg-6">
                <small>
                    <a href="{{ route('articles.index') }}">
                        &LeftArrow; Back to Articles

                    </a>
                </small>
                <h1 class="display-5 fw-bold lh-1 mb-3">{{ $article->title }}</h1>
                <p class="lead">{{ $article->content }}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <h4>
                        {{ $article->post_date }}
                    </h4>
                    <h5 class="text-secondary">
                        {{ $article->category ? $article->category->name : 'Uncategorized' }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
