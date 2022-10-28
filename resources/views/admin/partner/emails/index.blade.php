@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
<div class="container col-md-10 mt-5 ">
    <h5>Listado de Correos Enviados a los Partners</h5>
    {{-- <form action="{{route('partner.email.sended')}}" method="GET">
      <div class="d-flex p-2">
        <div class="mx-1">
          <input type="text" name="name" placeholder="Nombre" class="form-control" required>
        </div>
        <div class="mx-1">
          <input type="text" name="lastname" placeholder="Apellido" class="form-control">
        </div>
        <div class="mx-1">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </form> --}}
    <div>
      @if (count($emails_sended) > 0)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Partner</th>
                <th scope="col">Asunto</th>
                <th scope="col">Fecha de envío</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($emails_sended as $email)
                @php 
                  $date = date_create($email->created_at); 
                  $partner = \App\Partner::find($email->partner_id);
                @endphp
                    <tr>
                    <th scope="row">{{$email->id_email_sended}}</th>
                    <td><a href="{{route('partner.show', $partner)}}">{{ $partner->name . " " . $partner->lastname}}</a></td>
                    <td>{{$email->subject}}</td>
                    <td>{{date_format($date, "d-M-y")}}</td>
                    <td><a href="{{route('partner.email.sended.show', $email->id_email_sended)}}">Ver correo</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
      @else
      <div>
        No hemos encontrado correos enviados
      </div>
      @endif
    </div>
    <div>
      {{$emails_sended->links()}}
    </div>
</div>
@endsection

@section('end-scripts')

@endsection