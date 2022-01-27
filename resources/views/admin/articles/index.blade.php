@extends('layouts.admin')
@section('content')
    <div class="content_header d-flex justify-content-between">
        <h1>Articles</h1>
        <a name="" id="" class="btn btn-dark h-75" href="{{ route('admin.articles.create') }}" role="button">ADD
            ARTICLE</a>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">SLUG</th>
                <th scope="col">POST DATE</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->slug }}</td>
                    <td>{{ $article->post_date }}</td>
                    <td class="col">
                        <a href="{{ route('admin.articles.show', $article->slug) }}" class="pb-1">view</a> |
                        <a href="{{ route('admin.articles.edit', $article->slug) }}" class="pb-1">edit</a> |
                        <!-- Button trigger modal -->
                        <a href="#">
                            <button class="btn btn-link p-0 pb-1" data-bs-toggle="modal"
                                data-bs-target="#delete_{{ $article->slug }}">
                                delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete_{{ $article->slug }}" tabindex="-1" role="dialog"
                                aria-labelledby="{{ $article->slug }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete {{ $article->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-danger">
                                            Warning! This article will be permanently deleted! are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <form action="{{ route('admin.articles.destroy', $article->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}

@endsection
