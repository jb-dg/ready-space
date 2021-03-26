@component('mail::message')
# Bienvenue sur Ready Space !

Hello {{ $data->username }},
<br>
merci de ton inscription ! 

{{ config('app.name') }}
@endcomponent
