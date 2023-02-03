@extends('layouts.web')
@section('header')
<title>Poderes Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description"        content="Un poder es un documento que otorga control sobre sus activos a otra persona. Contáctenos para ayudarlo con el trámite en {{$data['office']}} ✔">       
<meta name="keywords"           content="poder notarial, carta poder, carta poder apostillada, como hacer carta poder, como llenar carta poder, como elaborar carta poder, modelo de carta poder, ejemplo de carta poder, carta poder ejemplo, carta poder notarial, carta poder para que sirve, carta poder que es, poder notarial ejemplo, poder notarial apostillado, como hacer un poder notarial, poder notarial en {{Str::lower($data['office'])}}, poder en estados unidos, carta poder estados unidos, poder notarial estados unidos, carta poder {{ Str::lower($data['office']) }}, poder notarial {{ Str::lower($data['office']) }}, que es un poder, que es una carta poder, que es un poder notarial, para que sirve una carta poder, tipos de carta poder, requisitos para carta poder en {{ Str::lower($data['office']) }}, notarizar carta poder en {{ Str::lower($data['office']) }}, carta poder en {{ Str::lower($data['office']) }}, donde puedo notarizar una carta poder en {{ Str::lower($data['office']) }}, donde tramitar un poder en {{ Str::lower($data['office']) }}, donde puedo hacer un poder en {{ Str::lower($data['office'])}}, tramitar poder notarial en {{Str::lower($data['office'])}} estados unidos, tramitar carta poder en {{Str::lower($data['office'])}} estados unidos" />

<meta property="og:url"         content="{{Request::url()}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Poderes Notarizados y Apostillados  en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description" content="Un poder o carta poder, es un documento legal que se utiliza para otorgar control total sobre sus activos a otra persona si usted no pudiera estar presente." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<style>
  #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
</style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title">Poder Notarial en {{ $data['office'] }}</h1>
              <p class="heading-title h3">Generales y Especiales</p>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
            
            <div>
              {!! $data['body'] !!}
            </div>

            <div class="d-flex justify-content-center">
              <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
            </div>

            @if (!sizeof($posts) == 0)
              <div class="mt-5">
                <p class="h4">Artículos que pueden interesarle</p>
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-12 col-md-4">
                        <div data-aos="flip-left" id="card_posts" class="card my-2">
                            <a href="{{route('post.slug',$post->slug)}}" class="stretched-link">
                                <img data-src="{{url('uploads/'.$post->imgdir)}}" class="lazy card-img-top" alt="Imagen {{ $post->name }}" style="object-fit: cover;width: 100%; height: 150px !important;">
                                {{-- {{url('uploads/'.$post->imgdir)}} --}}
                            </a>
                            <div class="card-body p-2" style="position:relative;">
                            <span class="d-block text-muted font-weight-bold text-truncate "
                                    style="font-size:1rem">{{$post->name}}</span>
                            <span class="d-block text-muted text-truncate">
                                <?php echo strip_tags(substr($post->body,0,300))  ?>
                            </span>
                            {{-- <div class="small text-muted float-left">{{$post->created_at->format('M d')}}</div> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
              </div>
            @endif
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header text-white" style="background-color: #333 !important;">
         <p class="modal-title h5" id="exampleModalLabel">Complete el siguiente formulario y en breve le contactamos.</p>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         @include('z-form')
       </div>
     </div>
   </div>
 </div>
@endsection

@section('numberWpp', $data['telfWpp'])

@section('script')
<script async src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>
  var scriptBootstrap = document.createElement('script');
  scriptBootstrap.src = "{{ asset('js/bootstrap.min.js') }}";

  var scriptPopper = document.createElement('script');
  scriptPopper.src = "{{ asset('js/popper.min.js') }}";
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('../img/poder.jpg')";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

