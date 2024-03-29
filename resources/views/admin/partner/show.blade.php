@extends('layouts.app')

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
@endsection

@section('content')
    <div class="container col-md-10 mt-5 ">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('delete-file'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('delete-file') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('emailsent'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('emailsent') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="pb-2">
            <h4>Perfil del Partner {{ $partner->name}} {{ $partner->lastname }}</h4>
            <div>
                @if (Auth::user()->email == 'developer2@notarialatina.com')
                    <div class="float-right mr-1">
                        <a href="{{ route('partner.set.slug', $partner) }}">
                            Set Slug
                        </a>
                    </div>
                @endif
                @if(count($comments_status)>0 && ($partner->status == "NO APLICA" || $partner->status == "NO PUBLICADO"))
                    <div class="float-right">
                        <button type="button" class="btn rounded-0 text-white" style="background-color: #002542" data-toggle="modal" data-target="#modalCommentsStatus">
                            Comentarios
                        </button>                              
                    </div>
                @endif
                <div class="float-right mr-1">
                    <button class="btn rounded-0 text-white" style="background-color: #002542" data-toggle="modal" data-target="#modalSendEmail">
                        Enviar correo
                    </button>
                </div>
                <div class="float-right mr-1">
                    <button class="btn rounded-0 text-white" style="background-color: #002542" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                        Ver Clientes
                        <span class="bg-white text-dark rounded px-1 font-weight-bold">{{count($partner->customers)}}</span>
                    </button>
                </div>
                @if(isset($partner) && $partner->status == "PUBLICADO")
                <div class="float-right mr-1">
                    <a target="_blank" href="{{route('web.showpartner', $partner->slug)}}" class="btn rounded-0 text-white" style="background-color: #002542">Ver perfil</a>
                </div>
                @endif
            </div>
        </div>
        <div class="form-group mt-5 border shadow p-5">
            {!! Form::model($partner, ['route' => ['partner.update', $partner], 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm-3">
                    <div>
                        @isset($partner->img_profile)
                            <img id="picture" class="img-fluid" width="200" height="150" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
                        @else
                            <img id="picture" class="img-fluid" src="{{ asset('img/user.webp') }}" width="200" height="150" alt="No se pudo cargar la imagen">
                        @endisset
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('img_profile', 'Imagen de perfil') !!}
                        {!! Form::file('img_profile', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => 'showPreview(event);']) !!}
                        @error('img_profile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="d-flex">
                        <div>
                            {!! Form::select('status',[null => 'SELECCIONE', 'NO PUBLICADO' => 'NO PUBLICADO','PUBLICADO' => 'PUBLICADO', 'NO APLICA' => 'NO APLICA'], $partner->status, ['class' => 'form-control custom-select rounded-0', 'onchange' => 'showCommentInput(this);']) !!}
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group mx-3">
                            {!! Form::submit('Guardar',  ['class' => 'btn rounded-0 text-white', 'style' => 'background-color: #002542']) !!}
                        </div>
                        
                        @if ($partner->fecha_publicado != null)
                            <div class="mt-2 ml-5">
                                <p>Fecha Publicado: <b>{{ Str::limit($partner->fecha_publicado, 10, '')}}</b></p>
                            </div>
                        @endif
                        
                        @if($partner->attached_file != null)
                        <div class="mt-2 ml-5">
                            <p><a target="_blank" href="{{ asset('storage/'.$partner->attached_file) }}">Ver adjunto</a></p>
                        </div>
                        @else
                        <div class="mt-2 ml-5">
                            <p style="font-weight: bold">No hay archivos adjuntos</p>
                        </div>
                        @endif
                    </div>
                    <div class="mb-3 d-none" id="div_comment_status">
                        {!! Form::label('comment', "Indique la razón del cambio de Estado", ['class' => 'font-weight-bold']) !!}
                        {!! Form::text('comment', null, ['class' => 'form-control rounded-0']) !!}
                    </div>

                    {{--NOMBRE Y APELLIDO, EMAIL, NACIONALIDAD--}}
                    <p style="font-weight: bold">DATOS PERSONALES</p>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('title', 'Titulo') !!}
                                @if ($partner->title != null)
                                {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], $partner->title, ['class' => 'form-control rounded-0']) !!}
                                @else
                                {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], null, ['class' => 'form-control rounded-0']) !!}
                                @endif
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', $partner->name, ['class' => 'form-control rounded-0']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('lastname', 'Apellido') !!}
                                {!! Form::text('lastname', $partner->lastname, ['class' => 'form-control rounded-0']) !!}
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', $partner->email, ['class' => 'form-control rounded-0']) !!}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    {{--PAIS DE RESIDENCIA, CODIGO, TELEFONO--}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('country_residence', 'Pais de residencia') !!}
                                @if ($partner->country_residence != null)
                                {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Chile' => 'Chile', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->country_residence, ['class' => 'form-control rounded-0', 'onchange' => 'changeCodPais();']) !!}    
                                @else
                                {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Chile' => 'Chile', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], null, ['class' => 'form-control rounded-0', 'onchange' => 'changeCodPais();']) !!}
                                @endif
                                @error('country_residence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('codigo_pais', 'Código País') !!}
                                @if ($partner->codigo_pais != null)
                                {!! Form::text('codigo_pais', $partner->codigo_pais , ['class' => 'form-control rounded-0', 'readonly']) !!}
                                @else
                                {!! Form::text('codigo_pais', null, ['class' => 'form-control rounded-0', 'readonly']) !!}
                                @endif
                            @error('codigo_pais')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('phone', 'Telefono') !!}
                                {!! Form::number('phone', $partner->phone, ['class' => 'form-control rounded-0']) !!}
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    {{--ESTADO-PROVINCIA,CIUDAD, DIRECCION--}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('state', 'Estado') !!}
                                @if ($partner->state != null)
                                {!! Form::text('state', $partner->state, ['class' => 'form-control rounded-0']) !!}
                                @else
                                {!! Form::text('state', null, ['class' => 'form-control rounded-0']) !!}
                                @endif
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('city', 'Ciudad') !!}
                                @if ($partner->city != null)
                                {!! Form::text('city', $partner->city, ['class' => 'form-control rounded-0']) !!}    
                                @else
                                {!! Form::text('city', null, ['class' => 'form-control rounded-0']) !!}
                                @endif
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('address', 'Dirección') !!}
                                @if ($partner->address != null)
                                {!! Form::text('address', $partner->address, ['class' => 'form-control rounded-0']) !!}
                                @else
                                {!! Form::text('address', null, ['class' => 'form-control rounded-0']) !!}
                                @endif
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{--REDES SOCIALES--}}
            <p class="mt-3" style="font-weight: bold">REDES SOCIALES</p>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('link_facebook', 'Link de perfil de Facebook') !!} <i class="fab fa-facebook-square"></i>
                        @if ($partner->link_facebook != null)
                        {!! Form::text('link_facebook', $partner->link_facebook, ['class' => 'form-control rounded-0']) !!}
                        @else
                        {!! Form::text('link_facebook', null, ['class' => 'form-control rounded-0']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('link_instagram', 'Link de perfil de Instagram') !!} <i class="fab fa-instagram"></i>
                        @if ($partner->link_instagram != null)
                        {!! Form::text('link_instagram', $partner->link_instagram, ['class' => 'form-control rounded-0']) !!}
                        @else
                        {!! Form::text('link_instagram', null, ['class' => 'form-control rounded-0']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('link_linkedin', 'Link de perfil de LinkedIn') !!} <i class="fab fa-linkedin"></i>
                        @if ($partner->link_linkedin != null)
                        {!! Form::text('link_linkedin', $partner->link_linkedin, ['class' => 'form-control rounded-0']) !!}
                        @else
                        {!! Form::text('link_linkedin', null, ['class' => 'form-control rounded-0']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('website', 'Sitio Web') !!} <i class="fas fa-globe"></i>
                        @if ($partner->website != null)
                        {!! Form::text('website', $partner->website, ['class' => 'form-control rounded-0']) !!}
                        @else
                        {!! Form::text('website', null, ['class' => 'form-control rounded-0']) !!}
                        @endif
                    </div> 
                </div>
            </div>

            {{--ESPECIALIDADES--}}
            <p style="font-weight: bold">INFORMACIÓN PROFESIONAL</p>
            
            <div class="row mb-3">
                <div class="col-sm-6">
                    {!! Form::label('numlicencia', 'Número de Licencia') !!}
                    @if ($partner->numlicencia)
                    {!! Form::text('numlicencia', $partner->numlicencia, ['class' => 'form-control rounded-0']) !!}
                    @else
                    {!! Form::text('numlicencia', null, ['class' => 'form-control rounded-0']) !!}
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('company', 'Empresa') !!}
                        @if ($partner->company)
                        {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], $partner->company, ['class' => 'form-control rounded-0', 'onchange' => 'showInputNameCompany()']) !!}
                        @else
                        {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], null, ['class' => 'form-control rounded-0', 'onchange' => 'showInputNameCompany()']) !!}
                        @endif
                    @error('company')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div id="divCompanyName" class="col-sm-4" @if ($partner->company == "Empresa") style="display: block" @else style="display: none" @endif>
                    {!! Form::label('company_name', 'Nombre de la Empresa') !!}
                    @if ($partner->company_name != null)
                        {!! Form::text('company_name', $partner->company_name, ['class' => 'form-control rounded-0']) !!}
                    @else
                        {!! Form::text('company_name', null, ['class' => 'form-control rounded-0']) !!} 
                    @endif
                    @error('company_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <p>Área de especialización <b>(Escoja entre 1 a 3 opciones)</b></p>
                <div class="form-group">
                    <div class="row">
                        @foreach ($specialties as $specialty)
                            <div class="col-sm-4">
                            <label for="specialties">
                            {!! Form::checkbox('specialties[]', $specialty->id, null) !!}
                            {{ $specialty->name_specialty}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                @error('specialties')
                    <div>
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                </div>

            {{-- <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('specialty', 'Especialidad(es)') !!} <b>(Descripción más detallada)</b>
                        @isset ($partner->specialty)
                        {!! Form::text('specialty', $partner->specialty, ['class' => 'form-control', 'onkeyup' => 'countChars();']) !!}
                        @else
                        {!! Form::text('specialty', null, ['class' => 'form-control', 'onkeyup' => 'countChars();']) !!}
                        @endisset
                        <div class="d-flex">
                            <p id="charNum">0 caracteres</p>
                            <span class="text-success" style="margin-left: 5px">(Mínimo: 150 caracteres - Máximo: 200 caracteres)</span>
                        </div>   
                        @error('specialty')
                            <div>
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror   
                    </div>
                </div>
            </div> --}}

            {{--BIOGRAFIA--}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('biography_html', 'Biografia') !!} <b>(Descripción de trayectoria y experiencia en su área)</b>
                        {!! Form::textarea('biography_html', $partner->biography_html, ['class' => 'form-control','rows' => '4']) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="text-success float-right" style="font-size: 13px">(Mínimo: 600 caracteres - Máximo: 1000 caracteres)</span>
                            </div>
                        </div>
                        @error('biography_html')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="position-relative">
                <hr>
                <div class="position-absolute">
                    <p style="margin-top: -28px" class="bg-primary rounded-pill px-2 text-white h5">Multimedia</p>
                </div>
            </div>

            <div class="row mt-5 ml-1">
                @isset($partner->url_video)
                    <div>
                        <video width="200px" src="{{asset('storage/'.$partner->url_video)}}" controls></video>
                    </div>
                @endisset
                <div class="form-group mx-5">
                    {!! Form::label('presentation', 'Video de presentación') !!}
                    {!! Form::file('presentation', ['class' => 'form-control-file', 'accept' => 'video/*']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            @if(isset($partner->url_video))
            <div class="row mt-2 ml-1">
                <form class="form-delete-video" action="{{route('home.partner.delete.video', $partner)}}" method="POST">
                    @csrf
                    <button class="btn btn-danger rounded-0 btn-delete-video">Eliminar video</button>
                </form>
            </div>
            @endif
        </div>

        {{-- MODAL PARA ENVIAR MENSAJE AL CORREO DEL PARTNER --}}
        <div class="modal fade" id="modalSendEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            {!! Form::open(['route' => ['send.email.notification.partner', $partner], 'method' => 'POST']) !!}
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Enviar mensaje al partner {{ $partner->name }} {{ $partner->lastname}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::text('asunto', null, ['class' => 'form-control', 'placeholder' => 'Asunto']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Escribe el mensaje...']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                </div>
              </div>
            {!! Form::close() !!}
            </div>
        </div>

        {{-- MODAL PARA VER LOS CLIENTES DEL PARTNER --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
              <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <h4 style="font-weight: bold">Clientes del Partner {{ $partner->name }} {{ $partner->lastname }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    @if (count($partner->customers) > 0)
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Mensaje</th>
                                    <th scope="col">Fecha registro</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($partner->customers as $customer)
                                        <tr>
                                            <th>{{ $customer->nombre }}</th>
                                            <td>{{ $customer->pais }}</td>
                                            <td>{{ $customer->telefono }}</td>
                                            <td>{{ $customer->mensaje }}</td>
                                            <td>{{ $customer->pivot->created_at }}</td>
                                        </tr>      
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row d-inline text-center">
                            <div class="mt-5">
                                <img class="img-fluid" src="{{ asset('img/partners/computer.png') }}" alt="">
                            </div>
                            <div class="mt-4">
                                <h4>Por el momento no hemos encontrado registros</h4>
                            </div>
                        </div>
                    @endif
                </div>
              </div>
            </div>
          </div>

          {{-- modal para mostrar los comentarios de no aplica --}}
          @if(count($comments_status)>0 && ($partner->status == "NO APLICA" || $partner->status == "NO PUBLICADO"))
          <div class="modal fade" id="modalCommentsStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Comentarios</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Tipo de Cambio</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Comentario</th>
                            <th scope="col">Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments_status as $commstat)
                                <tr class="my-2" style="border-left: 3px solid @if($commstat->type_value == 'NO APLICA') red @elseif($commstat->type_value === "NO PUBLICADO") gray @endif">
                                <th scope="row">{{$commstat->type}}</th>
                                <td>{{$commstat->type_value}}</td>
                                <td>{{$commstat->comment}}</td>
                                <td>{{substr($commstat->created_at, 0, 10)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          @endif
          
    </div>
@endsection

@section('end-scripts')
    {{-- <script src="{{ asset('ckeditoradmin/ckeditor.js') }}"></script> --}}
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script>

        //show comment input when status = no aplica
        function showCommentInput(object){
            var div_comment_status = document.getElementById('div_comment_status');
            if(object.value == "NO APLICA" || object.value == "NO PUBLICADO"){
                div_comment_status.classList.remove("d-none");
                div_comment_status.classList.add("d-block");
                document.querySelector("input[name='comment']").required = true;
            } else {
                div_comment_status.classList.remove("d-block");
                div_comment_status.classList.add("d-none");
                document.querySelector("input[name='comment']").required = false;
            }
        }

        CKEDITOR.timestamp = "ABCD";

        window.addEventListener('load', function(){
            countChars();
            showInputNameCompany();
        });

        document.addEventListener("DOMContentLoaded", function(event) {
            CKEDITOR.replace('biography_html');
            CKEDITOR.replace('mensaje');
        });

        function changeCodPais(){
            var selectPaisResidencia = document.getElementById('country_residence');
            var inputCodPais = document.getElementById('codigo_pais');
                switch (selectPaisResidencia.value) {
                    case "Argentina":  inputCodPais.value = "+54";break;
                    case "Bolivia": inputCodPais.value = "+591";break;
                    case "Chile":inputCodPais.value = "+56"; break;
                    case "Colombia": inputCodPais.value = "+57";break;
                    case "Costa Rica": inputCodPais.value = "+506";break;
                    case "Ecuador": inputCodPais.value = "+593";break;
                    case "El Salvador": inputCodPais.value = "+503";break;
                    case "Estados Unidos": inputCodPais.value = "+1"; break;
                    case "Guatemala": inputCodPais.value = "+502";break;
                    case "Honduras": inputCodPais.value = "+504";break;
                    case "México": inputCodPais.value = "+52";break;
                    case "Nicaragua": inputCodPais.value = "+505";break;
                    case "Panamá": inputCodPais.value = "+507";break;
                    case "Paraguay": inputCodPais.value = "+595";break;
                    case "Perú": inputCodPais.value = "+51";break;
                    case "Puerto Rico": inputCodPais.value = "+1787";break;
                    case "República Dominicana": inputCodPais.value = "+1809";break;
                    case "Uruguay": inputCodPais.value = "+598";break;
                    case "Venezuela": inputCodPais.value = "+58";break;
                }
            }
        

        function countChars(){
            obj = document.getElementById('specialty');
            document.getElementById("charNum").innerHTML = obj.value.length+' caracteres';
        }

        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview  = document.getElementById("picture");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showInputNameCompany(){
            var selectCompany = document.getElementById('company').value;
            var divCompanyName = document.getElementById('divCompanyName');
            if(selectCompany == "Empresa"){
                divCompanyName.style.display = "block";
            } else {
                divCompanyName.style.display = "none";
            }
        }

        // let btn_delete_video = document.querySelector('.btn-delete-video');
        // if(btn_delete_video){
        //     btn_delete_video.addEventListener('click', function(event){
        //         event.preventDefault();
        //         if(confirm('¿Está seguro de eliminar el video?')){
        //             document.querySelector('.form-delete-video').submit();
        //         }
        //     });
        // }

        // function validateDelete(){
        //     let partner = prompt("Ingrese el nombre del partner a eliminar");
        //     let name_partner = document.getElementById('name').value + " " + document.getElementById('lastname').value;
        //     if(partner == name_partner)document.getElementById('formdeletepartner').submit();
        //     else alert('Los nombres no coinciden, inténtelo nuevamente');    
        // }
    </script>
@endsection

