@extends('admin.partner.layouts.sidebar')

@section('title-socios', 'Mis clientes - Notaria Latina')

@section('scripts')
    <style>
        body{
            background-color: rgb(244, 244, 252);
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <p id="txtpartner" style="display: none">{{ Str::lower(Auth::guard('partner')->user()->name.Str::lower(Auth::guard('partner')->user()->lastname).Str::lower(Auth::guard('partner')->user()->id)) }}</p>
        {{-- ALERT PARA INFORMAR DE LA NUEVA PAGINA DE MIS CLIENTES --}}
        <div id="alertinfoclientes" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <div>
                <h4 class="alert-heading">Bienvenido/a {{ Auth::guard('partner')->user()->name }}!</h4>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="setLocalStorage('{{ Str::lower(Auth::guard('partner')->user()->name.Str::lower(Auth::guard('partner')->user()->lastname).Str::lower(Auth::guard('partner')->user()->id)) }}');">
                <span aria-hidden="true">&times;</span>
            </div>
            <p>Queremos informarle que hemos creado esta sección para guardar un registro de sus clientes. Una vez que su perfil sea publicado y alguien contacte por usted, aparecerá en este listado.</p>
            <hr>
            <p class="mb-0" style="font-weight: bold">Notaria Latina le desea lo mejor! 👨‍⚖️</p>
        </div>

        <h4 class="mt-3 mb-3 text-center" style="font-weight: bold">Listado de clientes</h4>
        @if (count($customers) > 0)
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">País</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Fecha registro</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <th>{{ $customer->nombre }}</th>
                                <td><a href="mailto:{{$customer->email}}">{{ $customer->email }}</a></td>
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

    {{-- MODAL PARA VER EL MENSAJE DEL PARTNER --}}
    {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="txtMessageModal">

              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div> --}}
@endsection

@section('end-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var txtpartner = document.getElementById('txtpartner');
            if (localStorage.getItem(txtpartner.textContent)) {
                $('#alertinfoclientes').hide();
            } else {
                $('#alertinfoclientes').show();
            }
        });

        function setLocalStorage(partner){
            if(!localStorage.getItem(partner)){
                localStorage.setItem(partner, true);
            }
        }
    </script>
@endsection