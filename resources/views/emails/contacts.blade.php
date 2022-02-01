@component('mail::message')

# Message: {{ $message }}



From: {{ $name }}

Email: {{ $email }}

@component('mail::button', ['url' => route('home')])
Go to Website
@endcomponent


@endcomponent
