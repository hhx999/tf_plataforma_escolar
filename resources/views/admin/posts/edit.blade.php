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
  @if($post->photos->count())
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            @foreach($post->photos as $photo)
              <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                {{ method_field('DELETE') }} {{ csrf_field() }}
                <div class="col-md-2">
                  <button class="btn btn-danger btn-xs" style="position: absolute;"><i class="fa fa-remove"></i></button>
                  <img src="{{ url($photo->url) }}" class="img-responsive">
                </div>
              </form>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endif
  <form method="POST" action="{{ route('admin.posts.update', $post) }}">
    {{ csrf_field() }} {{ method_field('PUT') }}
    <div class="col-md-8">
      <!-- /.box -->
      <div class="box box primary">
            <div class="box-body">
              <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                <label for="">Título de la publicación</label>
                <input class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}" placeholder="Ingresa aquí el título de la publicación">
                {!! $errors->first('title','<span class="help-block">:message</span>') !!}
              </div>
              <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                <label for="">Contenido de la publicación</label>
                <textarea name="body" id="editor" class="form-control" id="" rows="10" placeholder="Ingresa el contenido de la publicación">{{ old('body', $post->body) }}</textarea>
                {!! $errors->first('body','<span class="help-block">:message</span>') !!}
              </div>
              <div class="form-group {{$errors->has('iframe') ? 'has-error' : ''}}">
                <label for="">Contenido embebido(iframe)</label>
                <textarea name="iframe" id="editor" class="form-control" id="" rows="2" placeholder="Ingresa contenido embebido(iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
                {!! $errors->first('iframe','<span class="help-block">:message</span>') !!}
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
                <input type="text" class="form-control pull-right" id="datepicker" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null )}}">
              </div>
            <!-- /.input group -->
          </div>
          <!-- /Date -->
          <!-- Categories -->
          <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
            <label>Categoría:</label>
            <select name="category_id" id="" class="form-control select2">
              <option value="" selected disabled>Selecciona una categoría</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}"
                  {{ old('category_id',$post->category_id) == $category->id ? 'selected' : '' }}
                  >{{ $category->name }}</option>
              @endforeach
            </select>
            {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
          </div>
          <!--/Categories -->
          <!-- Tags -->
          <div class="form-group {{$errors->has('tags') ? 'has-error' : ''}}">
            <label>Etiquetas</label>
            <select name="tags[]" 
                    class="form-control select2" 
                    multiple="multiple" 
                    data-placeholder="Selecciona una o más etiquetas" 
                    style="width: 100%;">
              @foreach($tags as $tag)
                  <option value="{{ $tag->id }}"
                    {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                    >{{ $tag->name }}</option>
                    }
              @endforeach
            </select>
            {!! $errors->first('tags','<span class="help-block">:message</span>') !!}
          </div>
          <!-- /Tags -->
          <!-- Extracto -->
          <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
            <label for="">Extracto de la publicación</label>    
            <textarea name="excerpt" class="form-control"  placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
            {!! $errors->first('excerpt','<span class="help-block">:message</span>') !!}
          </div>
          <!-- /Extracto -->
          <!-- Imágenes -->
          	<div class="form-group">
          		<div class="dropzone">
          			
          		</div>
          	</div>
          <!--/ -->
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

<!-- Estilos de la página -->
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/select2.min.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}">
@endpush

<!-- /Estilos de la página -->

<!-- Scripts de la página -->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
<!-- Select2 Multiple -->
<script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script type="text/javascript">
//Initialize Select2 Multiple Elements
$(".select2").select2({
    tags:true
});
//Date picker
$('#datepicker').datepicker({
  autoclose: true
});
//CK EDITOR
CKEDITOR.replace('editor');
CKEDITOR.config.height = 315;

var myDropzone = new Dropzone('.dropzone', {
	url: '/admin/posts/{{ $post->url }}/photos',
  paramName: 'photo',
  //acceptedFiles: 'image/*',
  //maxFilesize: 2,
  headers: {
    'X-CSRF-TOKEN': '{{ csrf_token() }}'
  },
	dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
});

myDropzone.on('error', function(file,res) {
  console.log(res);
  var msg = res.errors.photo[0];
  $('.dz-error-message:last > span').text(msg);
})
Dropzone.autoDiscover = false;

</script>

@endpush
<!-- /Scripts de la página -->