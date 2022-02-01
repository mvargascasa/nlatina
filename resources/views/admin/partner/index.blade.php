@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
<div class="col-9 mt-4">
    {!! Form::open(['route' => 'partner.index', 'method' => 'GET']) !!}
    <div class="row form-group mb-3">
        <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del partner']) !!}    
            </div>
            <div class="col-sm-2">
                {!! Form::submit('Buscar', ['class' => 'btn btn-info']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-3">
                    <h5><b>TOTAL PARTNERS: </b>{{ $total }}</h5>
                </div>
                <div class="col-sm-3">
                    <h5><b>PUBLICADOS: </b>{{ $published }}</h5>
                </div>
                <div class="col-sm-3">
                    <h5><b>NO PUBLICADOS: </b>{{$notpublished}}</h5>
                </div>
                <div class="col-sm-3">
                    <h5><b>EMAILS VERIFICADOS: </b>{{$verified}}</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold">
                    PARTNERS
                    {{-- {{ route('partner.form') }} --}}
                    <a class="btn btn-sm btn-primary float-right" href="{{ route('partner.show.latest.public') }}">Ultimos publicados</a>
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
@endsection

