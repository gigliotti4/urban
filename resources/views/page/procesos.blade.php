@extends('layouts.app')
@section('title', 'Nuestro Proceso')
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

{{-- procesos --}}
<div class="step-container py-5">
    @foreach($procesos as $proceso)
    <div class="step-header">
      <span class="step-number">{{$proceso->paso}}</span>
      <span class="step-separator"></span>
      <span class="step-title">{{$proceso->nombre}}</span>
    </div>
    <p class="step-description">{!!$proceso->descripcion!!}</p>
    @endforeach
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