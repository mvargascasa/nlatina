@extends('layouts.web')
@section('header')
    <title>Socios de Casa Credito Promotora</title>
    <meta name="description" content="Socios de Casa Credito Promotora">
    <style>
        .testimotionals {
            width:100%;
            display:inline-block;
        }

        .testimotionals .card {
            position:relative;
            overflow:hidden;
            width:100%;
            margin:0 auto;
            background:rgb(255, 255, 255);
            padding:20px;
            box-sizing:border-box;
            text-align:center;
            box-shadow:0 10px 40px rgba(0,0,0,.5)
        }

        .testimotionals .card .layer {
            z-index:2;
            position:absolute;
            top:calc(100% - 5px);
            height:100%;
            width:100%;
            left:0;
            background:linear-gradient(to left , rgb(50, 1, 50), rgb(50, 1, 50));
            transition:0.5s;
        }

        .testimotionals .card .content {
            z-index:2; 
            position:relative;
        }

        .testimotionals .card:hover  .layer{
            top:0;
        }

        .testimotionals .card .content p {
            font-size:14px;
            line-height:24px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .content p {
            font-size:14px;
            line-height:24px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content .image {
            width:45%; 
            height:60%;
            /* margin:0 auto; */
            /* border-radius:50%; */
            overflow:hidden;
            /* border: 4px solid white; */
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        
        }

        .testimotionals .card .conte nt .details h2 {
            font-size:18px;
            color:white;
        }
        .testimotionals .card .content .details h2 span {
            font-size:18px;
            color:purple;
            transition:0.5s;
        }

        .testimotionals .card:hover .content .details h2 span {
            color:white;
            position:relative
        }
    </style>
@endsection

@section('content')
<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >ABOGADOS LATINOS <br> A SU SERVICIO</h1>
            </div>
        </div>
    </div>
</section>

<div>
    <p class="text-center mt-5">Solicite los servicios de un abogado <br> en Latinoamérica</p>
</div>
<hr style="width: 50%">
<div class="row">
    <div class="col-sm-12 col-12 d-flex justify-content-center">
        <div style="display: inline-block" class="mr-2">
            <p><b>ORDENAR POR:</b></p>
        </div>
        <div class="dropdown mr-2" style="display: inline-block">
            <button class="btn btn-secondary dropdown-toggle bg-light text-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            País
            </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Ecuador</a>
          <a class="dropdown-item" href="#">Venezuela</a>
          <a class="dropdown-item" href="#">Colombia</a>
        </div>
      </div>
      <div class="dropdown" style="display: inline-block">
        <button class="btn btn-secondary dropdown-toggle bg-light text-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Especialidad
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Especialidad 1</a>
          <a class="dropdown-item" href="#">Especialidad 2</a>
          <a class="dropdown-item" href="#">Especialidad 3</a>
        </div>
      </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="testimotionals">
                <div class="card">
                <div class="layer"></div>
                <div class="content">
                    <div class="image">
                        <img  width="100px" src="https://abogadosecuador.com.ec/web/images/abogado-gabriel-mauricio-ponce-hernandez-abogado-en-quito.jpg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <div class="details">
                    <h2> Someone famous <br> <span>Backend developer</span></h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="testimotionals">
                <div class="card">
                <div class="layer"></div>
                <div class="content">
                    <div class="image">
                        <img  width="100px" src="https://abogadosecuador.com.ec/web/images/abogado-gabriel-mauricio-ponce-hernandez-abogado-en-quito.jpg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <div class="details">
                    <h2> Someone famous <br> <span>Backend developer</span></h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="testimotionals">
                <div class="card">
                <div class="layer"></div>
                <div class="content">
                    <div class="image">
                        <img  width="100px" src="https://abogadosecuador.com.ec/web/images/abogado-gabriel-mauricio-ponce-hernandez-abogado-en-quito.jpg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <div class="details">
                    <h2> Someone famous <br> <span>Backend developer</span></h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="testimotionals">
                <div class="card">
                <div class="layer"></div>
                <div class="content">
                    <div class="image">
                        <img  width="100px" src="https://abogadosecuador.com.ec/web/images/abogado-gabriel-mauricio-ponce-hernandez-abogado-en-quito.jpg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    <div class="details">
                    <h2> Someone famous <br> <span>Backend developer</span></h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection