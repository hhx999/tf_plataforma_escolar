@extends('layout')


@section('content')

<section class="pages container">
	<div class="page page-about">
		<h1 class="text-capitalize">Página no encontrada</h1>
		<div class="divider-2" style="margin: 35px 0;"></div>
		<p>La página que solicitaste no fue encontrada. <br> <a href="{{ route('pages.home') }}">Volver al inicio</a></p>
	</div>
</section>
@endsection