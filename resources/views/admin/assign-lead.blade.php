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
            <form action="{{route('partner.assign.lead')}}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <select name="partner_id" class="form-select form-control w-50" required>
                    <option value="">Seleccione</option>
                    @foreach ($partners as $partner)
                        <option value="{{$partner->id}}">{{$partner->name . " " . $partner->lastname}} - {{count($partner->customers)}}</option>
                    @endforeach
                </select>
                <button class="btn btn-success mt-4" type="submit">Asignar Lead</button>
            </form>
        </div>
        @if (session('status'))
            <div class="mt-4">
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            </div>
        @endif
    </div>
@endsection

@section('end-scripts')
    <script>

    </script>
@endsection