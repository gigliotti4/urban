@extends('layouts.app')
@section('title', 'Servicios')
@section('content')

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
                            <h5 class="carousel__titulo-servicio">{{ $slider->titulo }}</h5>
                            <p class="carousel__descripcion-servicio">{!! $slider->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item-servicio {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}');">
                    <div class="carousel-caption-servicio text-left">
                        <h5 class="carousel__titulo-servicio">{{ $slider->titulo }}</h5>
                        <p class="carousel__descripcion-servicio">{!! $slider->descripcion !!}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="container my-5">
    <div class="row">
        @foreach($servicios as $servicio)
        @php
        // Manejo seguro: verificar si es ya un array o es una cadena JSON
        $galeria = $servicio->galeria;
        if (is_string($galeria)) {
            $galeria = json_decode($galeria, true) ?? [];
        }
        @endphp
        <div class="col-6 col-md-3">
            <div class="bg-servicios mt-2" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#servicioModal{{ $servicio->id }}">
                <div class="imagen-container">
                    <img src="{{asset(Storage::url($servicio->imagen))}}" alt="{{$servicio->nombre}}">
                </div>
                <h5>{{$servicio->nombre}}</h5>
            </div>
        </div>
        
        <!-- Modal para el servicio -->
        <div class="modal fade" id="servicioModal{{ $servicio->id }}" tabindex="-1" aria-labelledby="servicioModalLabel{{ $servicio->id }}" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="servicioModalLabel{{ $servicio->id }}">{{ $servicio->nombre }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <!-- Galería de imágenes -->
                    @if(is_array($galeria) && count($galeria) > 0)
                    <div class="galeria-servicio">
                      <div 
                        class="fotorama"
                        data-transition="slide"
                        data-clicktransition="crossfade"
                        data-fit="cover"
                        data-keyboard="true"
                       
                        data-arrows="true"
                        data-click="true" 
                        data-height="500"
                        data-width="100%"
                        data-thumbmargin="20"
                        data-thumbwidth="100"
                        data-thumbheight="75"
                        data-loop="true"
                      >
                        @foreach($galeria as $img)
                          @if($img)
                          <img src="{{ asset(Storage::url($img)) }}" alt="{{$servicio->nombre}}">
                          @endif
                        @endforeach
                      </div>
                    </div>
                    @else
                    <img src="{{ asset(Storage::url($servicio->imagen)) }}" alt="{{ $servicio->nombre }}" class="img-fluid mb-3">
                    @endif
                  </div>
                  <div class="col-md-6">
                    <div class="d-flex flex-column h-100 justify-content-between">
                        <div>{!! $servicio->descripcion !!}</div>
                        <a href="{{ route('contacto') }}" class="btn btn__black">Solicitar presupuesto</a>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Banner --}}
<div class="banner-single" style="background-image: url('{{ asset(Storage::url($inicio->banner)) }}');">
    <div class="banner-overlay"></div>
    <div class="banner-content">
        <h5 class="carousel__titulo">{{ $inicio->titulo_banner }}</h5>
        <p class="carousel__descripcion">{!! $inicio->descripcion_banner !!}</p>
        <a type="button" href="{{ route('contacto') }}" class="btn btn__white mb-2">Solicitar presupuesto</a>
    </div>
</div>

@endsection

