@extends('layouts.app')

@section('scripts')

@endsection
@section('content')
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    CATEGORIAS
                    <a class="btn btn-sm btn-primary float-right" href="{{route('category.create')}}">Nueva Categoria</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="table table-sm" style="width:100%">
                        <tr><th>ID</th><th>IMG</th><th>NOMBRE</th><th>SLUG</th><th>DESCRIPCION</th></tr>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>
                                    @isset($cat->imgdir)
                                        <img src="{{url('img/i300_'.$cat->imgcat)}}" width="50">
                                    @endif
                            </td>
                        <td><a href="{{route('category.edit',$cat->id)}}">{{$cat->name}}</a></td>
                        <td>{{$cat->slug}}</td>
                        <td>{{$cat->body}}</td>

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
