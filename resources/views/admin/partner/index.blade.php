@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    PARTNERS
                    <a class="btn btn-sm btn-primary float-right" href="{{ route('partner.form') }}">Nuevo Partner</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="table table-sm" style="width:100%">
                        <tr>
                            <th>ID</th>
                            <th>IMG</th>
                            <th>NOMBRE</th>
                            <th>ESPECIALIDAD</th>
                            <th>PAIS DE RESIDENCIA</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>

                        @foreach ($partners as $partner)
                        <tr>
                            <td>{{ $partner->id }}</td>
                            <td>
                                
                                <img src="{{ asset('storage/'.$partner->img_profile)}}" width="80px" height="80px">
                                    {{-- @isset($cat->imgdir)
                                        <img src="{{url('img/i300_'.$cat->imgcat)}}" width="50">
                                    @endif --}}
                            </td>
                            <td>{{ $partner->name }} {{ $partner->lastname }}</td>
                            <td>{{ $partner->specialty}}</td>
                            <td>{{ $partner->country_residence }}</td>
                            <td>{{ $partner->status}}</td>
                            <td>
                                <a href="{{ route('partner.edit', $partner ) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

