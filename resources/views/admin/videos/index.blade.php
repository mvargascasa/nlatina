@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
<div class="container col-md-10 mt-5 ">
  <div class="d-flex">
    <div class="w-100">
      <h5>Videos de <b class="text-danger">YouTube</b> que se muestran en la página</h5>
    </div>
    <div class="w-100">
      <a class="float-right btn btn-danger rounded-0 mb-2" href="{{route('admin.create.video')}}">Crear Video</a>
    </div>
  </div>
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
      @if (count($videos) > 0)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Video</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                    <tr>
                        <th scope="row">{{$video->id }}</th>
                        <td><iframe width="100" height="50" src="{{$video->link}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
                        <td>{{ $video->title }}</td>
                        <td>{{$video->created_at}}</td>
                        <td class="font-weight-bold @if($video->status == 1) text-success @elseif($video->status == 0) text-danger @endif">@if($video->status == 1) PUBLICADO @elseif($video->status == 0) NO PUBLICADO @endif</td>
                        <td><a href="{{route('admin.edit.video', $video->id)}}">Editar video</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
      @else
      <div>
        No hemos encontrado videos
      </div>
      @endif
    </div>
</div>
@endsection

@section('end-scripts')

@endsection