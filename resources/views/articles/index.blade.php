@extends('layouts.app')
@section('content')
    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Articles</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach ($articles as $article)
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        style="background-image: url('{{ $article->image }}');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $article->title }}</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <a href="#" class="icon-link">
                                        See article
                                        <svg class="bi" width="1em" height="1em">
                                            <use xlink:href="#chevron-right"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#calendar3"></use>
                                    </svg>
                                    <small>{{ $article->post_date }}</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
