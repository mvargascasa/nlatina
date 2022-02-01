@extends('layouts.app')

@section('scripts')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: contain;
            width: 75%;
            height: 75%;
        }
    </style>
@endsection

@section('content')
<div class="col-9 mt-4">
    <div class="row">
        <div class="card" style="margin-left: 1%">
            <div class="card-header font-weight-bold">
                Ultimos PARTNERS publicados
            </div>

            <div class="card-body">
                {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif --}}

                <table id="example" class="table table-sm" style="width:100%">
                    <tr>
                        <th>IMG</th>
                        <th>NOMBRE</th>
                        <th>ESPECIALIDAD</th>
                        <th>PAIS DE RESIDENCIA</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>

                    @foreach ($partners as $partner)
                    <tr>
                        <td>
                            @isset($partner->img_profile)
                                <img src="{{ asset('storage/'.$partner->img_profile)}}" width="80px" height="80px">
                            @else
                                <img src="{{ asset('img/user.webp') }}" width="80px" height="80px" alt="">
                            @endisset  
                                {{-- @isset($cat->imgdir)
                                    <img src="{{url('img/i300_'.$cat->imgcat)}}" width="50">
                                @endif --}}
                        </td>
                        <td>
                            {{ $partner->name }} {{ $partner->lastname }}
                            <p class="text-muted" style="font-size: 13px">{{ $partner->created_at->format('d/m/Y')}}</p>
                        </td>
                        <td>
                            @isset($partner->specialty)
                                {{Str::limit($partner->specialty, 100)}}
                            @else
                                <b>Sin información</b> 
                            @endisset
                        </td>
                        <td>
                            @isset($partner->country_residence)
                                {{ $partner->country_residence}}
                            @else
                                <b>Sin información</b> 
                            @endisset
                        </td>
                        <td>{{ $partner->status}}</td>
                        <td>
                            <a target="_blank" href="{{ route('web.showpartner', $partner ) }}" class="btn btn-info" style="font-size: 11px">Ver perfil</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('end-scripts')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            CKEDITOR.replace('biography_html');
        });    
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview  = document.getElementById("picture");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection

