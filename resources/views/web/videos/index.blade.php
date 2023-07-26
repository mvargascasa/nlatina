@extends('layouts.web')

@section('header')
    <title>¿Necesita información sobre Servicios Notariales?</title>
    <meta name="description" content="En nuestra sección de Multimedia puede encontrar una variedad de videos sobre trámites notariales. Ingrese aquí para obtener más información">
    <meta name="keywords" content="notaria latina, notaria publica latina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="¿Necesita información sobre Servicios Notariales?">
    <meta property="og:description" content="En nuestra sección de Multimedia puede encontrar una variedad de videos sobre trámites notariales. Ingrese aquí para obtener más información">
    <meta property="og:image" content="{{ asset('img/partners/BANNER-PARTNERS.webp') }}">

    <livewire:styles />
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')
    <section id="prisection" style="background-size: cover;background-position: center center; background-repeat: no-repeat;">
        <div>
            <div class="row justify-content-center align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
                <div class="col-sm-12 col-12 text-white text-center">
                    <h1>Multimedia Notaria Latina</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row text-center mt-5">
            <div class="card-group">
                @foreach ($videos as $video)
                    <div class="col-sm-4 mb-4">
                        <div class="card h-100 shadow rounded-0">
                            <iframe width="auto" height="250" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>  
                            <div class="card-body">
                                <h5 class="card-title">{{$video->title}}</h5>
                                <p class="card-text text-muted">{{$video->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <livewire:partners-videos />

    </div>
@endsection

@section('numberWpp', '13479739888')

@section('script')
<livewire:scripts />
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('{{url('img/videos-notaria-latina.jpg')}}')";
        });
    </script>
@endsection

