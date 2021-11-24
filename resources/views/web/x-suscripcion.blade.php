@extends('layouts.web')
@section('header')
    <title>Notaria Latina</title>
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Suscripción</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-sm-6 col-lg-6 p-4">

        <h3>¿Desea mantenerse al día con las últimas noticias?</h3>
        <h3 class="pt-4"> Suscríbase a nuestro portal</h3>


            {!! Form::open(['route' => 'landing.thankpost']) !!}
            <div class="form-group">
                {!! Form::label('fname', 'Nombres') !!}
                {!! Form::text('fname', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label(null, 'Seleccione sus Intereses:') !!}
            </div>

            <div class="form-check">
                {!! Form::checkbox('migra', 'Información para el Migrante',  false, ['id'=>'migra', 'class' => 'form-check-input']) !!}
                {!! Form::label('migra', 'Información para el Migrante', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check">
                {!! Form::checkbox('nota', 'Servicios de Notaría', false, ['id'=>'nota','class' => 'form-check-input']) !!}
                {!! Form::label('nota', 'Servicios de Notaría', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check">
                {!! Form::checkbox('consu', 'Información Consular', false, ['id'=>'consu','class' => 'form-check-input']) !!}
                {!! Form::label('consu', 'Información Consular', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-group pt-4">
                {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-warning btn-block']) !!}
            </div>

            {!! Form::close() !!}


            </div>
        </div>
</div>


@endsection

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/suscripcion.jpg')";
    });
  </script>
@endsection

