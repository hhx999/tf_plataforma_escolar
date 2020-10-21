@extends('admin.layout')

@section('header')

      <h1>
        POSTS
        <small>Crear publicación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear publicación</li>
      </ol>

@stop

@section('content')

<div class="row">
  <form action="">
    <div class="col-md-8">
      <!-- /.box -->
      <div class="box box primary">
            <div class="box-body">
              <div class="form-group">
                <label for="">Título de la publicación</label>
                <input class="form-control" type="text" name="title" placeholder="Ingresa aquí el título de la publicación">
              </div>
              <div class="form-group">
                <label for="">Contnido de la publicación</label>
                <textarea name="body" id="editor" class="form-control" id="" rows="10" placeholder="Ingresa el contenido de la publicación"></textarea>
              </div>

            </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-body">
          <!-- Date -->
          <div class="form-group">
            <label>Fecha de publicación:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="published_at">
              </div>
            <!-- /.input group -->
          </div>
          <!-- /Date -->
          <!-- Categories -->
          <div class="form-group">
            <label>Categoría:</label>
            <select name="category_id" id="" class="form-control">
              <option value="" selected disabled>Selecciona una categoría</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <!--/Categories -->
          <!-- Tags -->
          <div class="form-group">
            <label>Etiquetas</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
              @foreach($tags as $tag)
                  <option id="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach
            </select>
          </div>
          <!-- /Tags -->
          <!-- Extracto -->
          <div class="form-group">
            <label for="">Extracto de la publicación</label>    
            <textarea name="excerpt" class="form-control"  placeholder="Ingresa un extracto de la publicación"></textarea>
          </div>
          <!-- /Extracto -->
          <!-- -->
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
          <!-- -->
        </div>
      </div>
    </div>
  </form>
</div>


@stop

@push('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/select2.min.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}">
@endpush

@push('scripts')

<!-- Select2 Multiple -->
<script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script type="text/javascript">
//Initialize Select2 Multiple Elements
$(".select2").select2();
//Date picker
$('#datepicker').datepicker({
  autoclose: true
});
//CK EDITOR
CKEDITOR.replace('editor');
</script>
@endpush