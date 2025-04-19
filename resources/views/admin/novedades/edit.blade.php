@extends('admin.layouts.master')

@section('content')
<h3>Editar Novedad</h3>
<form method="post" action="{{ route('admin.novedades.update', ['id' => $novedad->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Para indicar que es un método PUT (actualización) --}}
    <div class="row">
        <div class="form-group col-md-6">
            <label for="orden">Orden</label>
            <input type="text" class="form-control" id="orden" name="orden" value="{{ $novedad->orden }}">
        </div>
        <div class="form-group col-md-6">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $novedad->titulo }}">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control summernote" name="descripcion" id="descripcion" cols="30" rows="10">{{ $novedad->descripcion }}</textarea>
        </div>
    </div>

    <div class="row">
     

        <div class="form-group col-md-6 my-4">
            <label for="imagen">Imagen 900x675px</label> <br>
            <input type="file" class="form-control-file" id="imagen" name="imagen">
            @if($novedad->imagen)
                <p>Imagen actual:</p>
                <img src="{{asset(Storage::url($novedad->imagen))}}" class="img-thumbnail mt-4">
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection
