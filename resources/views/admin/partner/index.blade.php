@extends('layouts.app')

@section('scripts')
    <livewire:styles />
@endsection

@section('content')
<div class="mt-4 overflow-y-auto px-5">
    {{-- @if (session('success'))
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
                {!! Form::text('name', null, ['class' => 'form-control', 'value' => "old('name', '')", 'placeholder' => 'Nombre del partner']) !!}    
            </div>
            <div class="col-sm-5">
                {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Apellido del partner']) !!}    
            </div>
            <div class="col-sm-2">
                {!! Form::submit('Buscar', ['class' => 'btn btn-info']) !!}
            </div>
        </div>
    {!! Form::close() !!} --}}
    <div class="row">
        <livewire:list-partners />
    </div>
</div>

@php
    $emailsPartners = \App\Partner::select('email')->where('numlicencia', '=', null)->get();
@endphp
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
<livewire:scripts />
    {{-- <script src="{{ asset('ckeditoradmin/ckeditor.js') }}"></script>
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
    </script> --}}
@endsection

