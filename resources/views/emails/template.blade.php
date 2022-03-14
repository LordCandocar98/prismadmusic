@component('mail::message')
# {{$details['title']}}

<h3>{{ $details['subtitle'] }}</h3>
<p>
{{ $details['body'] }}
</p>

<p>{{ $details['descripcion'] }}</p>
@component('mail::button', ['url' => $details['enlace']])
{{ $details['button'] }}
@endcomponent

Gracias, atentamente,<br>
{{ config('app.name') }}
@endcomponent
