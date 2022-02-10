@extends('layouts.web')

@section('header')
    <title>Motor Vehicle Commission en {{ $data['office'] }}</title>
    
@endsection

@section('content')
<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Motor Vehicle Commission en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

  <div class="container pt-4">
            <h3 class="font-weight-bold pt-4">¿Qué documentos necesita para la obtención de su licencia?</h3>
            <p class="text-muted text-justify">
                Todos los residentes de Nueva Jersey que soliciten una licencia de conducir deben mostrar prueba de identidad
                (por ejemplo un pasaporte, certificado de nacimiento, o tarjeta de identificación consular), prueba de 
                dirección de NJ (ejemplo: una factura, contrato de arrendamiento que demuestre que reside en NJ), y prueba
                de su edad.  Su prueba de residencia de Nueva Jersey debe cumplir con requisitos específicos con respecto
                a la fecha de emisión de la documentación. 
            </p>

            <h3 class="font-weight-bold pt-4">¿Aceptará la MVC mis documentos si están en un idioma que no sea el inglés?</h3>
            <p class="text-muted text-justify">
                Se requerirá una traducción certificada para TODOS los documentos que no sean escritos en Inglés. 
                Notaria Publica Latina en New jersey le ofrece una traducción certificada de los documentos de la MVC para su trámite.  
            </p>

            <h3 class="font-weight-bold pt-4">¿Cuánto cuesta y cómo se puede pagar?</h3>
            <p class="text-muted">
                El permiso cuesta $10 dólares y la licencia de conducir estándar de NJ cuesta $24 dólares. Puede pagar con tarjetas
                como American Express®, MasterCard®, Visa®, Discover card®, cheques o efectivo.
            </p>

            <h3 class="font-weight-bold pt-4">¿Tuvo problemas con el trámite?</h3>
            <p class="text-muted text-justify">
                Si un solicitante cree que ha sido tratado injustamente o que se le ha negado el servicio injustamente, puede presentar una queja formal ante la NJMVC utilizando <a target="_blank" href="https://www.state.nj.us/mvc/pdf/about/Title_VI_Form.pdf"> este formulario en inglés</a>. Recuerde que no puede haber discriminación o la denegación de servicio por motivos de raza, color, origen nacional u otras categorías protegidas.
                Recuerde, la Comisión de Vehículos de Motor de Nueva Jersey no le debería preguntar sobre su estatus migratorio o pedir compensación adicional para realizar el trámite. 
                Para preguntas generales en inglés o español, puede enviar un correo electrónico a <a href="mailto:MVC.Correspondence@mvc.nj.gov">MVC.Correspondence@mvc.nj.gov</a> 
            </p>

       <h3 class="font-weight-bold pt-4">¿En que tiempo me entregan mis documentos traducidos?</h3>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header text-white" style="background-color: #333 !important;">
           <h5 class="modal-title" id="exampleModalLabel">Complete el siguiente formulario y en breve le contactamos.</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           @include('z-form')
         </div>
       </div>
     </div>
   </div>
@endsection

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('../img/vehicle_commission.webp')";
        });
    </script>
@endsection