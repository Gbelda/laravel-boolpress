@component('mail::message')

# Message: {{ $message }}



From: {{ $name }}

Email: {{ $email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
