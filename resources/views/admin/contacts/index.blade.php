@extends('layouts.admin')
@section('content')
    <div class="content_header d-flex justify-content-between">
        <h1>Contacts</h1>
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
                <th scope="col">NAME</th>
                <th scope="col">SUBJECT</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->name }}</td>
                    <td class="w-50">{{ $contact->subject }}</td>
                    <td>{{ $contact->email }}</td>
                    <td class="col">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#view">
                            view
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="view" tabindex="-1" role="dialog"
                            aria-labelledby="view_{{ $contact->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $contact->subject }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-primary">
                                        <p>
                                            {{ $contact->message }}
                                        </p>
                                        <small class="text-dark">From: {{ $contact->email }}</small>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> |



                        <a href="#" class="pb-1">edit</a> |
                        <!-- Button trigger modal -->
                        <button class="btn btn-link p-0" data-bs-toggle="modal"
                            data-bs-target="#delete_{{ $contact->id }}">
                            delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete_{{ $contact->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="{{ $contact->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete {{ $contact->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-danger">
                                        Warning! This contact will be permanently deleted! are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}

@endsection
