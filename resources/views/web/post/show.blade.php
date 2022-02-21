@extends('layouts.web')
@section('header')
    <title>Notaría Latina en New York - {{$post->name}}</title>
    <meta name="description" content="{{$post->metadescrip}}"/>
    <meta name="keywords" content="{{ $post->keywords }}">
    <meta property="og:url"                content="{{route('post.slug',$post->slug)}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Notaría Latina - {{$post->name}}" />
    <meta property="og:description"        content="{{$post->metadescrip}}" />
    <meta property="og:image"              content="{{url('uploads/i600_'.$post->imgsmall)}}" />

    <style>
        @media screen and (max-width: 580px){
            #imgBlog{
                float: none !important;
                justify-content: center !important;
                padding: 0px !important;
            }

            #rowImageBanner{
                min-height: 0px !important;
                padding-top: 120% !important;
            }
        }
    </style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

@php
    // $height = \Intervention\Image\Facades\Image::make('uploads/'.$post->imgdir);
@endphp

    <section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
        <div>
            <div id="rowImageBanner" class="row align-items-center" style="min-height:550px; background:rgba(2, 2, 2, 0.5);">
            </div>
        </div>
    </section>

    <div class="container pt-4">
        <h1 class="font-weight-bold heading-title">{{$post->name}}</h1>
        <div class="row">
            <div class="col-12" style="white-space: pre-wrap; text-align: justify">
                <img id="imgBlog" class="p-4 float-right img-fluid" width="500" alt="Imagen {{ $post->name }}" src='{{url('uploads/i600_'.$post->imgsmall)}}'>
            <?php echo htmlspecialchars_decode($post->body)?>
            </div>
        </div>
        <hr>
        <div class="col-12 text-center">
            <h2 class="tit-not">Temas Relacionados</h2>
        </div>
            <div class="row">
                @foreach ($posts as $lpost)
                    <div class="col-12 col-md-4">
                        <div class="card my-2">
                            <a href="{{route('post.slug',$lpost->slug)}}" class="stretched-link">
                                <img src="{{url('uploads/'.$lpost->imgdir)}}" class="card-img-top" alt="{{ $post->name }}" style="object-fit: cover;height: 150px !important;">
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
    </div>

@endsection

@section('numberWpp', '13479739888')

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/'.$post->imgdir)}}')";
        });
    </script>
@endsection

