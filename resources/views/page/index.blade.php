@extends('layouts.app')

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
                        <div class="carousel-caption text-left">
                            <h5 class="carousel__titulo">{{ $slider->titulo }}</h5>
                            <p class="carousel__descripcion">{!! $slider->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}');">
                    <div class="carousel-caption text-left">
                        <h5 class="carousel__titulo">{{ $slider->titulo }}</h5>
                        <p class="carousel__descripcion">{!! $slider->descripcion !!}</p>
                        <a type="button" href="{{ route('empresa') }}" class="btn btn__white mb-2">Solicitar presupuesto</a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        
        {{-- servicios --}}
        <div class="container my-5">
            <div class="row">
                <h3 class="text-center mb-5 titulo-secciones">Nuestros servicios</h3>
                @foreach($servicios as $index => $servicio)
                <div class="col-6 col-md-3">
                    <div class="bg-servicios mt-2">
                        <div class="imagen-container">
                            <img src="{{asset(Storage::url($servicio->imagen))}}" alt="{{$servicio->nombre}}">
                        </div>
                        <h5>{{$servicio->nombre}}</h5>
                    </div>
                </div>
                @endforeach
                <div class="text-center mt-5">

                    <a type="button" href="{{ route('servicios') }}" class="btn btn__black mb-2">Ver todos</a>
                </div>
    </div>
</div>

{{-- procesos --}}
<div class="step-container">
    @foreach($procesos as $proceso)
    <div class="step-header">
      <span class="step-number">{{$proceso->paso}}</span>
      <span class="step-separator"></span>
      <span class="step-title">{{$proceso->nombre}}</span>
    </div>
    <p class="step-description">{!!$proceso->descripcion!!}</p>
    @endforeach
    <div class="text-center mt-5">

        <a type="button" href="{{ route('contacto') }}" class="btn btn__black mb-2">Contáctanos ahora</a>
    </div>
</div>

{{-- productos --}}
<div class="container my-5">
    <h3 class="text-center titulo-secciones">Héchale un vistaso a nuestros catálogos</h3>
    
    <div class="row mt-5">
        @foreach($productos as $producto)
        <div class="col-md-6 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm">
                    <!-- Imagen de la Categoría con efecto zoom -->
                    <div class="card-img-categoria">
                        <div class="card-img-inner" style="background-image: url('{{ asset(Storage::url($producto->imagen)) }}');"></div>
                        <!-- Contenido con título y ver más -->
                        <div class="card-content">
                            <h5 class="text-white m-0">{{ $producto->nombre }}</h5>
                            <span class="ver-mas-link">Ver más <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="text-center mt-5">

            <a type="button" href="{{ route('productos') }}" class="btn btn__black mb-2">Ver todos</a>
        </div>
    </div>
</div>

{{-- Contenido Inicio --}}
<div class="mt-5" style="overflow: hidden" data-aos="fade-up" data-aos-duration="1500">
    <div class="row">
        <div class="col-md-5" style="background-color: #131313; display: flex; align-items: center; height: 600px;">
            <div class="p-5 text-left">
                <h3 class="contenido__subtitulo">Nosotros</h3>
                <h3 class="contenido__titulo">{{$inicio->titulo}}</h3>
                <div class="contenido__descripcion my-5">{!!$inicio->descripcion!!}</div>
                <a type="button" href="{{ route('empresa') }}" class="btn btn__white mb-2 px-5">MÁS INFORMACIÓN</a>
            </div>
        </div>

        <div class="col-md-7 p-0">
            <div style="background-image: url('{{asset(Storage::url($inicio->imagen))}}');
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            height:600px;">
            </div>
        </div>
    </div>
</div>

{{-- Blog --}}
<div class="container my-5">
    <h3 class="titulo-secciones text-center">No te pierdas ninguna noticia</h3>
    <h3 class="subtitulo-secciones text-center">Nuestro Blog</h3>
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
        <div class="text-center mt-5">

            <a type="button" href="{{ route('novedades') }}" class="btn btn__black mb-2">Ver todos</a>
        </div>
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


