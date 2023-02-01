@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
<div class="container col-md-10 mt-5 ">

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

  <div class="d-flex">
    <div class="w-100">
        @if(isset($video))
            <h5>Editar video {{$video->id}}</h5>
        @else
            <h5>Crear nuevo video</h5>
        @endif
    </div>
  </div>
    <div class="row mx-3 my-2">
        <div class="col-sm-6 border shadow py-4">
            @if(isset($video))
                {!! Form::model($video, ['route' => ['admin.update.video', $video->id], 'method' => 'PUT']) !!}
            @else
                {!! Form::open(['route' => 'admin.store.video', 'method' => 'POST']) !!}
            @endif
                @csrf
                <div class="d-flex">
                    <div class="form-group w-100 mr-1">
                        {!! Form::label('title', 'Titulo del Video', ['class' => 'font-weight-bold']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control rounded-0', 'required']) !!}
                    </div>
                    <div class="form-group w-100 ml-1">
                        {!! Form::label('status', 'Estado', ['class' => 'font-weight-bold']) !!}
                        {!! Form::select('status', ["" => 'Seleccione', 1 => 'PUBLICADO', 0 => 'NO PUBLICADO'], null, ['class' => 'form-control rounded-0', 'required']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Breve descripción del video', ['class' => 'font-weight-bold']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control rounded-0', 'rows' => 3, 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('link', 'Link del video', ['class' => 'font-weight-bold']) !!}
                    {!! Form::text('link', null, ['class' => 'form-control rounded-0', 'required']) !!}
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info rounded-0">Guardar</button>
                </div>
            {!! Form::close() !!}
        </div>
        @if(isset($video))
        <div class="col-sm-6">
            <iframe width="560" height="315" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        @endif
    </div>
</div>
@endsection

@section('end-scripts')

@endsection