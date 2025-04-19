@extends('layouts.app')
@section('title', 'Blog')
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
    <div class="row mt-5">
        @foreach ($novedades as $novedad)
        <div class="col-md-4 mb-4">
            <div class="card blog-card">
                <a href="{{ route('novedad', $novedad->id) }}" class="text-decoration-none text-dark">
                    <img src="{{ asset(Storage::url($novedad->imagen)) }}" class="w-100" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $novedad->titulo }}</h5>
                        <div class="card-text-corto">{!! Str::limit($novedad->descripcion, 80, '...') !!}</div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection