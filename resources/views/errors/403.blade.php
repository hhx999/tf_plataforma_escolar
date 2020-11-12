@extends('layout')


@section('content')

<section class="pages container">
	<div class="page page-about">
		<h1 class="text-capitalize">Página no autorizada</h1>
		{{ $exception->getMessage() }}
		<div class="divider-2" style="margin: 35px 0;"></div>
		<p>Tu usuario no puede acceder a esta página. <br> <a href="{{ url()->previous() }}">Volver</a></p>
	</div>
</section>
@endsection