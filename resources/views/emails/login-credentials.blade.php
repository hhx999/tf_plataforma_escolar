@component('mail::message')
#Has sido registrado/a

Utiliza estas credenciales para acceder al sistema.

@component('mail::table')
	| Usuario | Contraseña |
	|:---------|:------------|
	| {{ $user->email}} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Ingresa aquí
@endcomponent

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
