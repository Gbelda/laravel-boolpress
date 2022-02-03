@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card text-left" v-for="article in articles">
                <img class="card-img-top w-25" :src="'storage/'+article.image" alt="">
                <div class="card-body">
                    <h4 class="card-title">@{{ article.title }}</h4>
                    <p class="card-text">@{{ article.content }}</p>
                </div>
            </div>
        </div>
    </div>

    <h1>Articles</h1>

    {{-- <articles></articles> --}}
@endsection
