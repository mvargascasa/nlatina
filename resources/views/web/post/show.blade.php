@extends('layouts.web')

@section('header')
    <title>{{$post->name}}</title>
    <meta name="description" content="{{$post->metadescrip}}"/>
    <meta name="keywords" content="{{ $post->keywords }}">
    <meta property="og:url"                content="{{route('post.slug',$post->slug)}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="{{$post->name}}" />
    <meta property="og:description"        content="{{$post->metadescrip}}" />
    <meta property="og:image"              content="{{url('uploads/i600_'.$post->imgsmall)}}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap'); */
        @font-face{font-family: 'Roboto',sans-serif !important} */
        h2{font-size: 25px !important}
        @media screen and (max-width: 580px){
            #imgBlog{float: none !important;justify-content: center !important;padding: 0px !important;}
            #rowImageBanner{min-height: 350px !important;}
            #prisection{height: 350px !important;}
            h1{font-size: 25px !important; }
            h2{font-size: 20px !important; font-weight: 600 !important}
            #benefits{margin-top:25px !important}
        }
    </style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

    <section id="prisection" style="background-size: cover; background-repeat: no-repeat; width: 100%; height: 550px">
        <div>
            <div id="rowImageBanner" class="row align-items-center" style="min-height: 550px; background:rgba(2, 2, 2, 0.5);">
            </div>
        </div>
    </section>

    <div class="container pt-4" style="font-family: 'Roboto' !important">
        <div class="row mt-2 mb-2 ml-1">
            <div class="col-sm-6 border-left">
                <p class="d-flex align-items-center"><img class="lazy" width="20" height="20" data-src="{{ asset('img/calendar.webp') }}" alt="{{$post->name}}"><b style="font-weight: 500;" class="ml-1 mr-1">Fecha de Publicación:</b> {{ $post->created_at->format('M d, Y')}}</p>
            </div>
            @isset($post->reading_time)
            <div class="col-sm-6 border-left">
                <p class="d-flex align-items-center"><img class="lazy" width="20" height="20" data-src="{{ asset('img/reloj.webp') }}" alt="{{ $post->name}}"><b style="font-weight: 500" class="ml-1 mr-1">Tiempo de Lectura:</b> {{ $post->reading_time}} min.</p>
            </div>
            @endisset
        </div>
        <h1 id="title" class="font-weight-bold heading-title">{{$post->name}}</h1>
        <div class="row">
            <div class="col-12" style="text-align: justify">
                <img id="imgBlog" class="p-4 float-right img-fluid lazy" width="500" height="100%" alt="Imagen {{ $post->name }}" data-src='{{url('uploads/i600_'.$post->imgsmall)}}'>
                <div class="mt-3" style="font-family: 'Roboto', Times, serif">
                    <?php echo htmlspecialchars_decode($post->body)?>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-4">
        <div class="col-12 text-center">
            <h2 class="tit-not">Temas Relacionados</h2>
        </div>
            <div class="row">
                @foreach ($posts as $lpost)
                    <div class="col-12 col-md-4">
                        <div class="card my-2">
                            <a href="{{route('post.slug',$lpost->slug)}}" class="stretched-link">
                                <img data-src="{{url('uploads/'.$lpost->imgdir)}}" class="card-img-top lazy" alt="{{ $post->name }}" style="object-fit: cover;height: 150px !important;">
                            </a>
                            <div class="card-body p-2" style="position:relative;">
                                <span class="d-block text-muted font-weight-bold text-truncate "
                                        style="font-size:1rem">{{$lpost->name}}</span>
                                <span class="d-block text-muted text-truncate">
                                    <?php echo strip_tags(substr($lpost->body,0,100))  ?>
                                </span>
                            <div class="small text-muted float-left">{{$lpost->created_at->format('M d')}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                <h2 class="text-center">¿Necesita realizar un trámite notarial?</h2>
                <p style="font-weight: 300; font-size: 20px" class="text-center mb-4">Gestionamos el proceso de una manera correcta y diligente.</p>
                <div class="row justify-content-center">
                    <div class="col-sm-6 border p-3" style="border-radius: 5px">
                        @include('z-form')
                        {{-- {!! Form::open(['route' => ['send.comment.post', $post->slug], 'method' => 'POST']) !!}
                        @csrf
                        <div class="d-flex">
                            <div class="form-group w-100">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
        
                            <div class="form-group w-100 ml-1">
                                {!! Form::label('lastname', 'Apellido') !!}
                                {!! Form::text('lastname', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Correo electrónico') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('message', 'Comentario') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'required']) !!}
                        </div>

                        {!! Form::submit('Enviar', ['class' => 'btn btn-warning']) !!}
    
                        {!! Form::close() !!} --}}
                    </div>
                    <div class="col-sm-6 w-100 justify-content-center" style="margin-top: auto !important; margin-bottom: auto !important">
                        <div id="benefits" class="text-center">
                            <p style="font-size: 23px"><span>Contáctenos y lo ayudamos con el procedimiento</span></p>
                            <p style="font-size: 17px"><i class="far fa-calendar-check" style="color: #FFC206"></i> Agende una cita en línea</p>
                            <p style="font-size: 17px"><i class="fas fa-headset" style="color: #FFC206"></i> Asesoramiento con personal calificado</p>
                            <p style="font-size: 17px"><i class="far fa-clock" style="color: #FFC206"></i> Trámites en el menor tiempo posible</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @if (session('sendcomment'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Gracias por enviar su comentario', 'Valoramos mucho su opinión', 'success');
                </script>
                ";    
        @endphp
    @endif
@endsection

@section('numberWpp', '13479739888')

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/'.$post->imgdir)}}')";
        });
        document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    </script>
@endsection

