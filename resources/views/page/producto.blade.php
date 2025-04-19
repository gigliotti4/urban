@extends('layouts.app')
@section('title', $producto->nombre)
@section('content')


<style>
        .carousel-item-servicio{
    height: 350px;
    background-size: cover;
    background-position: center;
    position: relative; /* Añadir posición relativa para que el pseudo-elemento se posicione correctamente */
}

.carousel-item-servicio::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.41);
    z-index: 1;
}

.carousel-video-wrapper {
    position: relative;
}

.carousel-video-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.41);
    z-index: 1;
}

.carousel-caption-servicio {
    position: absolute;
    text-align: left;
    left: 15%;
    bottom: 20px;
    right: auto;
    width: 70%;
    z-index: 2; /* Aumentar z-index para que el texto esté sobre la sombra */
}

.carousel__titulo-servicio, .carousel__descripcion-servicio {
color: white;
    font-family: 'Raleway';
    font-weight: 400;
    font-size: 36px;
    line-height: 130%;
    letter-spacing: 0%;

}
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicadores -->
    <div class="carousel-indicators justify-content-center">
        @foreach($sliders as $index => $slider)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            @if(Str::contains($slider->imagen, ['.mp4', '.mov', '.avi']))
                <!-- Elemento - Video -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-video-wrapper">
                        <video class="carousel-video" autoplay loop muted>
                            <source src="{{ asset(Storage::url($slider->imagen)) }}" type="video/mp4">
                            Tu navegador no soporta video HTML5.
                        </video>
                        <div class="carousel-caption-servicio text-left">
                            <h5 class="carousel__titulo-servicio">{{ $producto->nombre }}</h5>
                          
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item-servicio {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}'); 
                    ">
                    <div class="carousel-caption-servicio text-left" style="">
                        <h5 class="carousel__titulo-servicio">{{ $producto->nombre }}</h5>
                    
                      
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>



<div class="container my-5">
    <div class="row">
        <h3>{{$producto->nombre}}</h3>
        <span>{!!$producto->descripcion!!}</span>

        @php
        // Manejo seguro: verificar si es ya un array o es una cadena JSON
        $galeria = $producto->galeria;
        if (is_string($galeria)) {
            $galeria = json_decode($galeria, true) ?? [];
        }
      @endphp
      
      @if(is_array($galeria) && count($galeria) > 0)
        <div class="row mt-4">
          @foreach($galeria as $imagen)
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="imagen-producto-container">
                <img src="{{ asset(Storage::url($imagen)) }}" alt="Imagen de producto" class="img-fluid imagen-producto" data-bs-toggle="modal" data-bs-target="#imagenModal" data-imagen="{{ asset(Storage::url($imagen)) }}">
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="row">
          <div class="col-12">
            <p class="text-center">No hay imágenes disponibles</p>
          </div>
        </div>
      @endif
    </div>
</div>

<!-- Modal para mostrar imagen completa -->
<div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagenModalLabel">{{ $producto->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="imagenModalSrc" class="img-fluid" alt="Imagen de producto">
      </div>
    </div>
  </div>
</div>

<style>
  .imagen-producto-container {
    overflow: hidden;
    cursor: pointer;
    border-radius: 5px;
    height: 400px;
  }
  
  .imagen-producto {
    transition: transform .5s ease;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .imagen-producto:hover {
    transform: scale(1.1);
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const imagenModal = document.getElementById('imagenModal');
    imagenModal.addEventListener('show.bs.modal', function(event) {
      const imagen = event.relatedTarget;
      const src = imagen.getAttribute('data-imagen');
      document.getElementById('imagenModalSrc').src = src;
    });
  });
</script>

@endsection