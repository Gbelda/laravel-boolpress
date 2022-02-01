@component('mail::message')
    Hello Admin,

    {{ $data['message'] }}

    @component('mail::button', ['url' => route('home')])
        Click for Website
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
