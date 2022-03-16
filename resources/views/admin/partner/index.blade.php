@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
<div class="col-9 mt-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
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
    @elseif(session('notemailsent'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('notemailsent') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3">
            <h5><b>TOTAL: </b>{{ $partners->total() }}</h5>
        </div>
        <div class="col-sm-3">
            <h5><b>PUBLICADOS: </b>{{ $published }}</h5>
        </div>
        <div class="col-sm-3">
            <h5><b>NO PUBLICADOS: </b>{{$notpublished}}</h5>
        </div>
    </div>
    {!! Form::open(['route' => 'partner.index', 'method' => 'GET']) !!}
    <div class="row form-group mb-3">
        <div class="col-sm-5">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del partner']) !!}    
            </div>
            <div class="col-sm-5">
                {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Apellido del partner']) !!}    
            </div>
            <div class="col-sm-2">
                {!! Form::submit('Buscar', ['class' => 'btn btn-info']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    {{-- <div class="float-right ml-1">
                        <form id="formOrderBy" action="{{route('partner.index')}}" method="POST">
                            @csrf
                            <input type="hidden" id="inputOrderBy" name="orderBy" value="{{ $orderBy }}">
                            <button type="submit" onclick="changeOrderBy();" class="btn btn-outline-secondary"><img style="width: 15px; height: 15px" src="{{ asset('img/order.png') }}" alt=""></button>
                        </form>
                    </div> --}}

                    {{-- <div class="float-left">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Enviar correos
                        </button>
                    </div> --}} 
                    <div class="float-left">
                        <button class="btn btn-success">
                            <a style="text-decoration: none; color: #ffffff" href="{{ route('partner.show.all.customers') }}">Ver Clientes</a>
                        </button>
                    </div>
                    <div class="float-right ml-1">
                        <button class="btn btn-primary">
                            <a style="text-decoration: none; color: #ffffff" href="{{ route('partner.show.not.publicated') }}">No Publicados</a>
                        </button>
                    </div>
                    <div class="float-right ml-1">
                        <button class="btn btn-primary">
                            <a style="text-decoration: none; color: #ffffff" href="{{ route('partner.show.latest.public') }}">Publicados</a>
                        </button>
                    </div>
                    <div class="float-right ml-1">
                        <form action="{{route('partner.index')}}" method="POST">
                            @csrf
                            <input type="hidden" name="publicadosHoy" value="{{ Str::limit(date(now()), 10, '') }}">
                            <button type="submit" class="btn btn-primary">Publicados hoy <span class="badge badge-light"> {{ $countPublicadosHoy }}</span></button>
                        </form>
                    </div>
                    <div class="float-right">
                        <form action="{{route('partner.index')}}" method="POST">
                            @csrf
                            <input type="hidden" name="registradosHoy" value="{{ Str::limit(date(now()), 10, '') }}">
                            <button type="submit" class="btn btn-primary">Registrados hoy <span class="badge badge-light"> {{ $countRegistradosHoy }}</span></button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="table table-sm" style="width:100%">
                        <tr>
                            <th>IMG</th>
                            <th>NOMBRE</th>
                            <th>ESPECIALIDAD</th>
                            <th>TERMINOS Y CONDICIONES</th>
                            <th>PAIS DE RESIDENCIA</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>

                        @foreach ($partners as $partner)
                        <tr>
                            <td>
                                @isset($partner->img_profile)
                                    <img src="{{ asset('storage/'.$partner->img_profile)}}" width="80px" height="80px">
                                @else
                                    <img src="{{ asset('img/user.webp') }}" width="80px" height="80px" alt="">
                                @endisset  
                                    {{-- @isset($cat->imgdir)
                                        <img src="{{url('img/i300_'.$cat->imgcat)}}" width="50">
                                    @endif --}}
                            </td>
                            <td>
                                {{ $partner->name }} {{ $partner->lastname }}
                                <p class="text-muted" style="font-size: 13px">{{ $partner->created_at->format('d/m/Y')}}</p>
                            </td>
                            <td>
                                @isset($partner->specialty)
                                    {{Str::limit($partner->specialty, 100)}}
                                @else
                                    <b>Sin información</b> 
                                @endisset
                            </td>
                            <td>
                                @isset($partner->terminos_verified_at)
                                    Aceptó el <b>{{Str::limit($partner->terminos_verified_at, 10, '')}}</b> 
                                @else
                                    <b>Sin aceptar</b> 
                                @endisset
                            </td>
                            <td>
                                @isset($partner->country_residence)
                                    {{ $partner->country_residence}}
                                @else
                                    <b>Sin información</b> 
                                @endisset
                            </td>
                            <td>{{ $partner->status}}</td>
                            <td>
                                <a href="{{ route('partner.show', $partner ) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            {{ $partners->links() }}
        </div>
    </div>
</div>

@php
    $emailsPartners = \App\Partner::select('email')->where('numlicencia', '=', null)->get();
@endphp
{{-- MODAL PARA ENVIAR CORREOS --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('partner.send.email.masivo') }}" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Envio de correos a los partners que no tienen número de licencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="emails" class="form-control" value="@foreach($emailsPartners as $email){{$email->email}},@endforeach">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
                </div>
                <div class="form-group">
                    <textarea name="mensaje" id="txtareamensaje" rows="4"></textarea>
                </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('end-scripts')
    <script src="{{ asset('ckeditoradmin/ckeditor.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            CKEDITOR.replace('txtareamensaje');
        });
        function changeOrderBy(){
            var formOrderBy = document.getElementById('formOrderBy');
            var inputOrderBy = document.getElementById('inputOrderBy');
            formOrderBy.submit(() => {
                console.log(inputOrderBy.value);
                if(inputOrderBy.value == 'desc'){
                    inputOrderBy.value = 'asc';
                } else {
                    inputOrderBy.value = 'desc'; 
                }
            })
        }
    </script>
@endsection

