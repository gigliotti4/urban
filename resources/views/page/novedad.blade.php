@extends('layouts.app')
@section('title', $novedad->titulo)
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

<div class="container my-5" style="padding-bottom: 150px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @php
                // Decodificar la galería de forma segura
                $galeria_items = $novedad->galeria ? json_decode($novedad->galeria) : [];
            @endphp

            {{-- Verificar si hay imágenes en la galería --}}
            @if(is_array($galeria_items) && count($galeria_items) > 0)
                {{-- IMPLEMENTACIÓN FOTORAMA --}}
                <div class="fotorama"
                     {{-- data-nav="thumbs" --}}
                     data-allowfullscreen="true"
                     data-autoplay="true"
                     data-transition="crossfade"
                     data-width="100%"
                     data-height="500"
                     data-ratio="16/9"
                     data-fit="cover">

                    {{-- Imágenes de la galería --}}
                    @foreach($galeria_items as $imagen)
                        <img src="{{ asset(Storage::url($imagen)) }}" class="w-100">
                    @endforeach
                </div>
            @elseif($novedad->imagen)
                {{-- Mostrar imagen principal si no hay galería --}}
                <img src="{{ asset(Storage::url($novedad->imagen)) }}" class="img-fluid" alt="{{ $novedad->titulo }}" style="width: 100%; height: 500px; object-fit: cover;">
            @else
                {{-- Mensaje si no hay ni galería ni imagen principal --}}
                 <p class="text-center">No hay imágenes disponibles.</p>
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="titulo-empresa">{{ $novedad->titulo }}</h3>
            <span class="descripcion-empresa">{!! $novedad->descripcion !!}</span>
        </div>
    </div>
</div>

@endsection