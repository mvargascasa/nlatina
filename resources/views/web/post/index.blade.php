@extends('layouts.web')
@section('header')
@php
    $currentPage = Request::get('page');
@endphp
<title>Blog de Noticias sobre Trámites Consulares en New York - Página {{ $currentPage}}</title>
<meta name="description"        content="Noticias e Información para Ciudadanos de Latinos en New York, Trámites Consulares, Apostillas, Poderes, Renovación de Pasaportes. Página {{ $currentPage }}"/>
<meta name="keywords"           content="Noticias en New York, Tramites Consulares en New York, Apostillas en New York, Poderes en New York, Renovación de Pasaportes en New York" />
<meta property="og:url"         content="{{route('post.index')}}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="Blog de Noticias e Información sobre Trámites Consulares en New York" />
<meta property="og:description" content="Noticias e Información para Ciudadanos de Latinos en New York, Trámites Consulares, Apostillas, Poderes, Renovación de Pasaportes." />
<meta property="og:image"       content="https://notarialatina.com/img/meta-notaria-latina-queens-new-york.jpg" />
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
                <h1 class="font-weight-bold heading-title" >BIENVENIDOS</h1>
            </div>


      </div>
    </div>
  </section>

<div class="container pt-4">
    <div class="col-12 text-center">
        <h1>Últimas Publicaciones</h1>
    </div>

        <div class="row">

            @foreach ($posts as $post)
                <div class="col-12 col-md-4">
                    <div class="card my-2">
                        <a href="{{route('post.slug',$post->slug)}}" class="stretched-link">
                            <img src="{{url('uploads/'.$post->imgdir)}}" class="card-img-top" alt="Imagen {{ $post->name }}" style="object-fit: cover;height: 150px !important;">
                        </a>
                        <div class="card-body p-2" style="position:relative;">
                        <span class="d-block text-muted font-weight-bold text-truncate "
                                style="font-size:1rem">{{$post->name}}</span>
                        <span class="d-block text-muted text-truncate">
                            <?php echo strip_tags(substr($post->body,0,300))  ?>
                        </span>
                        <div class="small text-muted float-left">{{$post->created_at->format('M d')}}</div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
        {{$posts->links()}}
</div>


@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/blog-notaria-latina-2021.png')";
    });
  </script>
@endsection

