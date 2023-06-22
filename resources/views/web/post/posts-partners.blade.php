@extends('layouts.web')

@section('header')
    

    <link rel="stylesheet" href="{{ asset('css/posts-partners.min.css') }}">
@endsection

@section('phoneNumberHidden', '+13474283543')
@section('phoneNumber', '347-428-3543')

@section('content')
<section id="prisection">
    <section class="row align-items-center justify-content-center" style="min-height: 500px;background:rgba(2, 2, 2, 0.5)">
        <div class="text-white text-center mx-4">
            <p>Blog de abogados</p>
            <h1 class="title">Últimas noticias sobre asuntos legales</h1>
            <p class="mt-4">Hacer justicia y derecho, en todo tiempo es bien hecho</p>
        </div>
    </section>
</section>

<section class="container pt-5 pb-3">
    <p class="text-center text-muted description">En un mundo cada vez más complejo y lleno de desafíos legales, es crucial contar con el respaldo de profesionales confiables que defiendan tus derechos. <br> En nuestro blog de abogados, te ofrecemos la solución que necesitas.</p>
</section>

@if(!$mobile)
<section class="container">
    <div class="row">
        <article class="col-sm-4 position-relative my-2">
            <img class="img-fluid" src="{{ asset('img/partners/derecho-familiar.jpg') }}" alt="">
            <div class="position-absolute absolute-center bg-white py-3 px-5">
                <span>Familiar</span>
            </div>
        </article>
        <article class="col-sm-4 position-relative my-2">
            <img class="img-fluid" src="{{ asset('img/partners/derecho-migratorio.jpg') }}" alt="">
            <div class="position-absolute absolute-center bg-white py-3 px-5">
                <span>Migratorio</span>
            </div>
        </article>
        <article class="col-sm-4 position-relative my-2">
            <img class="img-fluid" src="{{ asset('img/partners/derecho-penal.jpg') }}" alt="">
            <div class="position-absolute absolute-center bg-white py-3 px-5">
                <span>Penal</span>
            </div>
        </article>
    </div>
</section>

{{-- <section class="bg-gray py-5 my-5">
    <section class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <p>Suscríbase y manténgase informado de las últimas noticias</p>
                <div class="d-flex  justify-content-center align-items-center">
                    <input type="email" class="rounded w-25 form-control mr-1" placeholder="Ingrese su correo electrónico">
                    <button class="ml-1 btn text-white" style="background-color: #2B384D">Suscribirme ></button>
                </div>
            </div>
        </div>
    </section>
</section> --}}
@endif

<section class="container mt-5">
    @livewire('card-post')
</section>

@endsection

@section('script')
<script>
    window.addEventListener('load', () => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/posts-partners.jpg')}}')";
    })
</script>
@endsection