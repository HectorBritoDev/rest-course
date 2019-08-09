@component('mail::message')
# Hola {{ $user->name }}

Has cambiado tu correo electrónico. Por favor verifica la nueva dirección usando el siguiente boton:

@component('mail::button', ['url' => route('verify',$user->verification_token) ])
Confirmar tu cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
