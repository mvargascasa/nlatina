@extends('layouts.web')
@section('header')
    <title>Socios de Casa Credito Promotora - Nombre del socio*</title>
    <style>
        .bg-header{
            background-color: #002542;
            width: 100%;
            height: 300px;
            position: absolute;
        }
        .container{
            position: relative;
        }
        .form{
            background-color: #002542;
            text-align: center;
        }
        input, textarea{
            width: 90%
        }

        .info-header{
            color: white;
        }

        @media screen and (max-width: 580px){
            .info-header{
                color: black;
            }
        }
    </style>
@endsection

@section('content')
    <div class="bg-header"></div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-6">
                <img class="float-right" src="{{asset('storage/' .$partner->img_profile )}}" alt="Imagen 1" width="250" height="310">
            </div>
            <div class="col-sm-6 mt-3 info-header">
                <h3><b>{{ $partner->name }} {{ $partner->lastname }}</b></h3>
                <p>{{ $partner->country_residence}}</p>
                {{-- <p>Baker y McKenzie Asociados</p> --}}
                <p>{{ $partner->specialty }}</p>
                <br>
                <div class="row">
                    <p class="ml-3"><i class="fas fa-phone-alt" style="color: rgb(241, 132, 15)"></i>{{ $partner->phone }}</p>
                    <p class="float-right ml-5"><i class="far fa-envelope" style="margin-right: 5px; color: rgb(241, 132, 15)"></i>{{ $partner->email }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-1"></div>
            <div class="col-sm-7 text-justify">
                <h6><b>Biografia</b></h6>
                <div>
                    {!! $partner->biography_html !!}
                </div>
                {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ipsum hic asperiores beatae nemo laborum molestiae qui accusantium iusto quis, fuga quod dolorem nulla perspiciatis ex saepe error pariatur inventore.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus beatae ullam necessitatibus labore repellat ad vel libero aperiam, vitae voluptatibus animi natus aut. Sapiente impedit, ab nulla omnis ex molestias?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet cupiditate reprehenderit molestiae accusantium architecto atque neque iure rerum eaque distinctio, reiciendis minima excepturi, adipisci nisi ex ipsum dolorem assumenda aliquid.</p>
                <h6><b>Enfoque de practica</b></h6>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, vitae rem. Distinctio doloribus fugit praesentium error incidunt ratione corrupti minima ipsum eaque, libero recusandae. Iste sequi illum sunt ducimus repellat.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam ducimus quod rem iste corrupti repudiandae velit repellat est consectetur, enim, non fugiat? Asperiores, dolorum. Est asperiores ipsum nulla sed quam!
                </p>
                <br>
                <h6><b>Asociaciones Profesionales y Membresías</b></h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequatur omnis cupiditate maxime velit officia qui explicabo sunt libero aperiam, provident autem totam, beatae consequuntur quae excepturi ipsa sint est.</p>
                <h6><b>Admisiones</b></h6>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum accusamus ipsam quas et harum ratione omnis atque libero, corporis ad amet molestias nam perspiciatis ex ducimus nihil repellendus quidem nobis?</p>
                <h6><b>Educacion</b></h6>
                <p>Universidad de Edimburgo (2001)</p>
                <p>Universidad de Edimburgo</p>
                <h6><b>Idiomas</b></h6>
                <p>Ingles</p> --}}
            </div>
            <div class="col-sm-4 border-left">
                <div style="color: #9A7A2E">
                    <h6><b>Otras especialidades</b></h6>
                    <p>Derecho penal</p>
                    <p>Derecho laboral</p>
                    <p>Familia</p>
                    <p>Fraude</p>
                    <p>Propiedad intelectual</p>
                </div>
                <div class="form mt-4 rounded">
                    <h5 class="text-white text-center p-3">Realice aquí una consulta</h5>
                    <form>
                        <input class="mb-4" type="text" id="nombre" placeholder="Nombre">
                        <input class="mb-4" type="number" id="nombre" placeholder="Telefono">
                        <textarea class="mb-4" id="mensaje" rows="4" placeholder="Mensaje"></textarea>
                        <button class="btn mb-3" style="background-color: #FEC02F" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection