@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    <div class="container col-md-10 mt-3">
        <div>
            <h1>Información de Lead</h1>
            <p> <b>Nombre:</b> {{$customer->nombre}}</p>
            <p><b>Email:</b> {{$customer->email}}</p>
            <p><b>País: </b> {{$customer->pais}}</p>
            <p><b>Estado:</b> {{$customer->estado}}</p>
            <p><b>Telefono: </b> {{$customer->phone}}</p>
            <p><b>Mensaje: </b> {{$customer->comment}}</p>
            <p><b>Proveniente: </b> {{$customer->proviene}}</p>
        </div>
        <hr>
        <div>
            <h2>Asignar a Abogado:</h2>
            <form action="">
                <select name="partner_id" class="form-select form-control w-50">
                    <option value="">Seleccione</option>
                    @foreach ($partners as $partner)
                        <option value="{{$partner->id}}">{{$partner->name . " " . $partner->lastname}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
@endsection

@section('end-scripts')
    
@endsection