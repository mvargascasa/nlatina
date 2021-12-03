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
            text-align:justify;
            /* box-shadow:0 10px 40px rgba(0,0,0,.5) */
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

        .testimotionals .card .content h5{
            margin-top: 10px;
            font-size:14px;
            color:rgb(160, 85, 85);
        }
        .testimotionals .card:hover .content h5{
            font-size:14px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content p{
            font-size:14px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .content p{
            font-size:14px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content h6{
            font-size:14px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .content h6{
            font-size:14px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content .row p{
            font-size:11px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .row p{
            font-size:11px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content .image {
            width:100%; 
            height:100%;
            overflow:hidden;
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
                    <h5><b>SAMUEL ABAD</b></h5>
                    <p>Abogado Laboral</p>
                    <h6><b>ECUADOR <img src="img/partners/ecuador.png"/></b></h6>
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <p><i class="fas fa-phone-alt"></i>+15116188585</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="float-right"><i class="far fa-envelope" style="margin-right: 5px"></i>Email</p>
                        </div>
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
                    <h5><b>SAMUEL ABAD</b></h5>
                    <p>Abogado Laboral</p>
                    <h6><b>ECUADOR <img src="img/partners/ecuador.png"/></b></h6>
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <p><i class="fas fa-phone-alt"></i>+15116188585</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="float-right"><i class="far fa-envelope" style="margin-right: 5px"></i>Email</p>
                        </div>
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
                    <h5><b>SAMUEL ABAD</b></h5>
                    <p>Abogado Laboral</p>
                    <h6><b>ECUADOR <img src="img/partners/ecuador.png"/></b></h6>
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <p><i class="fas fa-phone-alt"></i>+15116188585</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="float-right"><i class="far fa-envelope" style="margin-right: 5px"></i>Email</p>
                        </div>
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
                    <h5><b>SAMUEL ABAD</b></h5>
                    <p>Abogado Laboral</p>
                    <h6><b>ECUADOR <img src="img/partners/ecuador.png"/></b></h6>
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <p><i class="fas fa-phone-alt"></i>+15116188585</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="float-right"><i class="far fa-envelope" style="margin-right: 5px"></i>Email</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection