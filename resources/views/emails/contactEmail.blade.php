@component('mail::message')

    {{ $contact['message'] }}

    {{-- From: {{ $name }}
    Email:{{ $email }} --}}

    @component('mail::button', ['url' => route('home')])
        Click for Website
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent
