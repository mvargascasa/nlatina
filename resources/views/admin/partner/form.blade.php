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

        .card {
            width: 300px;
            background-color: #efefef;
            border: none;
            cursor: pointer;
            transition: all 0.5s
        }

        .image img {
            transition: all 0.5s
        }

        .card:hover .image img {
            transform: scale(1.5)
        }

        .btn {
            height: 140px;
            width: 140px;
            border-radius: 50%
        }

        .name {
            font-size: 22px;
            font-weight: bold
        }

        .idd {
            font-size: 14px;
            font-weight: 600
        }

        .idd1 {
            font-size: 12px
        }

        .number {
            font-size: 22px;
            font-weight: bold
        }

        .follow {
            font-size: 12px;
            font-weight: 500;
            color: #444444
        }

        .btn1 {
            height: 40px;
            width: 150px;
            border: none;
            background-color: #000;
            color: #aeaeae;
            font-size: 15px
        }

        .text span {
            font-size: 13px;
            color: #545454;
            font-weight: 500
        }

        .icons i {
            font-size: 19px
        }

        hr .new1 {
            border: 1px solid
        }

        .join {
            font-size: 14px;
            color: #a0a0a0;
            font-weight: bold
        }

        .date {
            background-color: #ccc
        }
    </style>
@endsection

@section('content')
<div class="col-9 mt-4">
    <div class="row">
        @foreach ($partners as $partner)
            <div class="col-sm-3" style="margin-right: 25px">
                <div class="card p-4">
                    <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="{{asset('storage/'.$partner->img_profile)}}" height="120" width="100" /></button> <span class="name mt-3">{{ $partner->name }} {{ $partner->lastname }}</span> <span class="idd">{{ $partner->country_residence }}</span>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">{{ $partner->state }}, {{ $partner->city}}</span> <span><i class="fa fa-copy"></i></span> </div>
                        <div class=" d-flex mt-2"> <a target="_blank" style="text-decoration: none; font-size: 12px;" class="btn1 btn-dark text-center" href="https://notarialatina.com/partners/{{$partner->slug}}">Ver perfil en Notaria Latina</a> </div>
                        <div class=" px-2 rounded mt-4 date "> <span class="join">Registrado el {{ $partner->created_at}}</span> </div>
                    </div>
                </div>
            </div>
        @endforeach
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

