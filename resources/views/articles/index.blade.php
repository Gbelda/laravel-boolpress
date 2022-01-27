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
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="#">Technology</a>
                <a class="p-2 link-secondary" href="#">Design</a>
                <a class="p-2 link-secondary" href="#">Culture</a>
                <a class="p-2 link-secondary" href="#">Business</a>
                <a class="p-2 link-secondary" href="#">Science</a>
                <a class="p-2 link-secondary" href="#">Health</a>
                <a class="p-2 link-secondary" href="#">Style</a>
                <a class="p-2 link-secondary" href="#">Travel</a>
            </nav>
        </div>


        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach ($articles as $article)
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        style="background-image: url('{{ $article->image }}');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-light text-shadow-1 bg-dark bg-opacity-50">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                                {{ Str::limit($article->title, 25, '...') }}
                            </h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <a href="{{ route('articles.show', $article->slug) }}" class="icon-link">
                                        See article
                                    </a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <small>{{ $article->post_date }}</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $articles->links() }}
        </div>
    </div>
@endsection
