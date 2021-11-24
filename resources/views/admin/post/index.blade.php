@extends('layouts.app')

@section('scripts')

@endsection
@section('content')
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    PUBLICACIONES
                    <a class="btn btn-sm btn-primary float-right" href="{{route('post.create')}}">Nueva Publicación</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="table table-sm" style="width:100%">
                        <tr><th>ID</th><th>IMG</th><th>TITULO</th><th>SLUG</th><th>DESCRIPCION</th></tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                    @isset($post->imgdir)
                                        <img src="{{url('uploads/i300_'.$post->imgdir)}}" width="50">
                                    @endif
                            </td>
                        <td><a href="{{route('post.edit',$post->id)}}" style="color:darkblue">{{$post->name}}</a></td>
                        <td>{{$post->slug}}</td>
                        <td><span class="@if($post->status=='PUBLICADO') font-weight-bold text-primary @else text-muted @endif">
                            {{$post->status}}</span></td>
                        <td>{{$post->created_at->format('d/M/y')}}</td>

                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('end-scripts')

@endsection
