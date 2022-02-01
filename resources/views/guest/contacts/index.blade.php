@extends('layouts.app')

@section('content')

    <!--Section: Contact v.2-->
    <section class="mb-4 container">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us
            directly. Our team will come back to you within
            a matter of hours to help you.
        </p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">

            <!--Grid column-->
            <form action="{{ route('contact.send') }}" method="post">
                @csrf
                <div class="form-group pb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name Lastname"
                        aria-describedby="nameHelp" value="{{ old('name') }}">
                    @error('name')
                        <small>
                            <div class="alert alert-danger">{{ $message }}</div>
                        </small>
                    @enderror
                </div>

                <div class="form-group pb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address"
                        aria-describedby="emailHelp" value="{{ old('email') }}">
                    @error('email')
                        <small>
                            <div class="alert alert-danger">{{ $message }}</div>
                        </small>
                    @enderror
                </div>

                <div class="form-group pb-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject"
                        aria-describedby="subjectHelp" value="{{ old('subject') }}">
                    @error('subject')
                        <small>
                            <div class="alert alert-danger">{{ $message }}</div>
                        </small>
                    @enderror
                </div>

                <div class="form-group pb-3">
                    <label for="message">Message Body</label>
                    <textarea class="form-control" name="message" id="message" rows="5">{{ old('message') }}</textarea>
                    @error('message')
                        <small>
                            <div class="alert alert-danger">{{ $message }}</div>
                        </small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-envelope-open fa-lg fa-fw"></i> Send</button>
            </form>
            <!--Grid column-->

        </div>

    </section>
    <!--Section: Contact v.2-->


@endsection
