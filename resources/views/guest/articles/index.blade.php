@extends('layouts.app')
@section('content')
    <div class="container px-4 py-5" id="custom-cards">

        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-center align-items-center">
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">Articles</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-evenly">
                @foreach ($categories as $category)
                    <a class="p-2 link-secondary"
                        href="{{ route('categories.articles', $category->slug) }}">{{ $category->name }}</a>
                @endforeach
            </nav>
        </div>


        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach ($articles as $article)
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        style="background-image: url('{{ $article->image }}');">
                        <div class="d-flex flex-column h-100 p-5 pb-1 text-light text-shadow-1 bg-dark bg-opacity-50">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                                {{ Str::limit($article->title, 25, '...') }}
                            </h2>
                            <ul class="d-flex list-unstyled mt-auto justify-content-between">
                                <li>
                                    <a href="{{ route('articles.show', $article->slug) }}" class="icon-link">
                                        See article
                                    </a>
                                </li>

                                <li>
                                    <small>{{ $article->post_date }}</small>
                                </li>
                            </ul>
                            <small
                                class="text-end">{{ $article->category ? $article->category->name : 'Uncategorized' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $articles->links() }}
        </div>
    </div>
@endsection
