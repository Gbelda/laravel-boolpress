@extends('layouts.app')

@section('content')

    <h1>Articles</h1>

    <div class="card text-left" v-for="article in articles">
        <img class="card-img-top w-25" :src="'storage/'+article.image" alt="">
        <div class="card-body">
            <h4 class="card-title">@{{ article.title }}</h4>
            <p class="card-text">@{{ article.content }}</p>
        </div>
    </div>

    {{-- <articles></articles> --}}
@endsection
