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

<style>
    .pagination li.active .page-link, .pagination li .page-link:hover {background-color: #122944;color: #ffffff;font-weight: bold;}
    .card:hover{box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;}
</style>
<script defer src="{{ asset('js/navbar-style-v1.1.js') }}"></script>
{{-- <livewire:styles /> --}}
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
        {{-- <livewire:categories-blog /> --}}
    </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card my-2 h-100">
                        <a href="{{route('post.slug',$post->slug)}}" class="stretched-link">
                            <img data-src="{{url('uploads/i600_'.$post->imgdir)}}" class="card-img-top lazy" alt="Imagen {{ $post->name }}" style="object-fit: cover;height: 150px !important;">
                            {{-- {{url('uploads/i900_'.$post->imgdir)}} --}}
                        </a>
                        <div class="card-body p-2" style="position:relative;">
                        <span class="d-block text-muted font-weight-bold"
                                style="font-size:1rem">{{$post->name}}</span>
                        <span class="d-block text-muted text-truncate">
                            <?php echo strip_tags(substr($post->body,0,300))  ?>
                        </span>
                    </div>
                    <div class="card-footer bg-white" style="border: none">
                        <div class="small text-muted float-left">
                            {{-- <img class="lazy" width="20" height="20" data-src="{{ asset('img/calendar.webp') }}" alt="{{$post->name}}">  --}}
                            <i class="far fa-calendar-alt" style="font-size: 17px"></i>
                            {{$post->created_at->format('M d, Y')}}
                        </div>
                        <div class="small text-muted float-right">
                            <p class="d-flex align-items-center">
                                {{-- <img class="lazy mr-1" width="20" height="20" data-src="{{ asset('img/reloj.webp') }}" alt="{{ $post->name}}">  --}}
                                <i class="far fa-clock mr-1" style="font-size: 17px"></i>
                                {{ $post->reading_time}} min.
                            </p>
                        </div>    
                    </div>
                    </div>
                </div>
            @endforeach

        </div>
        
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
</div>
@endsection

@section('numberWpp', '13479739888')

@section('script')
{{-- <livewire:scripts /> --}}
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/blog-notaria-latina-2021.webp')";
    });
    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
  </script>
@endsection

