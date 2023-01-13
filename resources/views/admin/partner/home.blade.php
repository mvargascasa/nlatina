@extends('admin.partner.layouts.sidebar')

@section('title-socios', 'Inicio Partners - Notaria Latina')

@section('scripts')

@endsection

@section('content')
    <section>
      <div class="container py-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  @isset(Auth::user()->img_profile)
                  <img src="{{asset('storage/'.Auth::user()->img_profile)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                  <img src="{{asset('img/partners/foto-perfil.jpg')}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                  @endisset
                  <h5 class="my-3">
                      @if (Auth::user()->title == "Abogado")
                          Abg.
                        @elseif(Auth::user()->title == "Licenciado")
                        Lic.
                      @endif
                      {{Auth::user()->name}} {{ Auth::user()->lastname}}
                  </h5>
                  @if (Auth::user()->state != null)
                    <p class="text-muted" style="margin-top: -10px">
                        {{Auth::user()->city}}, {{ Auth::user()->country_residence }}
                    </p>
                  @endif
                  @if (Auth::user()->company == "Empresa")
                    <p class="text-muted" style="margin-top: -15px">
                        {{Auth::user()->company_name}}
                    </p>
                  @else
                  <p class="text-muted" style="margin-top: -15px">
                    {{Auth::user()->company}}
                </p>
                  @endif
                </div>
              </div>
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                    <p class="mb-2"><span class="font-italic me-1" style="color: #002542; font-weight: bold">Puntuación</span></p>
                    @php
                        $rating = Auth::user()->averageRating();
                    @endphp
                    <div style="color: #9A7A2E;">
                        @foreach(range(1,5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>
                                @if($rating >0)
                                    @if($rating >0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                            @php $rating--; @endphp
                            </span>
                        @endforeach
                    </div>
                    <div style="color: #9A7A2E">  
                        <p>{{ Auth::user()->timesRated()}} opiniones</p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nombre Completo</p>
                    </div>
                    @if (Auth::user()->name != null && Auth::user()->lastname != null)
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                      </div>
                      @else
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">Sin información</p>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    @if (Auth::user()->email != null)
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                      </div>
                      @else
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">Sin información</p>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Teléfono/Celular</p>
                    </div>
                    @if (Auth::user()->phone != null)
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ Auth::user()->codigo_pais }} {{ Auth::user()->phone }}</p>
                    </div>
                    @else
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">Sin información</p>
                    </div>  
                    @endif
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Dirección</p>
                    </div>
                    @if (Auth::user()->address)
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                      </div>
                      @else
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">Sin información</p>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                          <ul class="list-group list-group-flush rounded-3">
                              @if (Auth::user()->website != null)
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe text-primary" style="font-size: 20px"></i>
                                <a target="_blank" href="{{Auth::user()->website}}" class="mb-0" style="font-size: 10px; text-decoration: none; color: #000000">{{Auth::user()->website}}</a>
                              </li>
                              @else
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe" style="font-size: 20px"></i>
                                <p style="font-size: 12px;" class="mb-0">Sin información</p>
                              </li>
                              @endif
                              @if (Auth::user()->link_linkedin != null)
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fab fa-linkedin text-primary" style="font-size: 20px"></i>
                                    <a target="_blank" href="{{Auth::user()->link_linkedin}}" class="mb-0" style="font-size: 10px; text-decoration: none; color: #000000">{{Auth::user()->link_linkedin}}</a>                    
                                </li>
                                @else
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-linkedin" style="font-size: 20px"></i>
                                    <p style="font-size: 12px;" class="mb-0">Sin información</p>
                                  </li>
                              @endif
                              @if (Auth::user()->link_instagram != null)
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-instagram" style="color: #ac2bac; font-size: 20px"></i> 
                                {{-- <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i> --}}
                                <a target="_blank" href="{{Auth::user()->link_instagram}}" class="mb-0" style="font-size: 10px; text-decoration: none; color: #000000">{{Auth::user()->link_instagram}}</a>
                              </li>
                                @else
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fab fa-instagram" style="font-size: 20px"></i>  
                                    <p style="font-size: 12px;" class="mb-0">Sin información</p>
                                  </li>
                              @endif
                              @if (Auth::user()->link_facebook != null)
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-square" style="color: #3b5998; font-size: 20px"></i>
                                <a target="_blank" href="{{Auth::user()->link_facebook}}" class="mb-0" style="font-size: 10px; text-decoration: none; color: #000000">{{Auth::user()->link_facebook}}</a>
                              </li>
                                  @else
                                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-square" style="font-size: 20px"></i>
                                    <p style="font-size: 12px;" class="mb-0">Sin información</p>
                                  </li>
                              @endif
                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                <div class="card mb-4 mb-md-0">
                  <div class="card-body">
                      <p class="mb-4"><span class="font-italic me-1" style="color: #002542; font-weight: bold">Especialidades</span></p>
                      @if (Auth::user()->specialty != null)
                      @foreach (Auth::user()->specialties as $specialty)
                          <p class="mb-1" style="font-size: .99rem;">• {{$specialty->name_specialty}}</p>
                      @endforeach
                        <p class="mt-4 mb-1" style="font-size: .90rem;">{{Auth::user()->specialty}}</p>
                        @else
                        <p class="mt-4 mb-1" style="font-weight: bold; font-size: .90rem;">No hay información que mostrar. <a href="{{ route('socios.edit', Auth::user()) }}">Edita tu perfil</a> para que puedas ver los cambios reflejados</p>
                      @endif
                  </div>
              </div>
                </div>
              </div>
            </div>
          </div>
            {{--ROW DE BIOGRAFIA--}}
          <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <p class="mb-2"><span class="font-italic me-1" style="color: #002542; font-weight: bold">Biografía</span></p>
                        @if (Auth::user()->biography_html != null)
                        {!! Auth::user()->biography_html !!}
                        @else
                        <p class="mt-4 mb-1" style="font-weight: bold; font-size: .90rem;">No hay información que mostrar. <a href="{{ route('socios.edit', Auth::user()) }}">Edita tu perfil</a> para que puedas ver los cambios reflejados</p>
                        @endif
                    </div>
                  </div>
                </div>
          </div>

          <div class="row justify-content-center mt-4">
            <button type="button" class="btn rounded-0 text-white" style="background-color: #002542" data-toggle="modal" data-target="#modalcontract">
              Claúsulas de Aceptación
            </button>
          </div>

          @if (Auth::user()->status == "PUBLICADO" && Auth::user()->link_facebook != null && Str::startsWith(Auth::user()->link_facebook, 'https'))
            <div class="mt-4">
              <a target="_blank" class="btn" href="https://www.facebook.com/sharer/sharer.php?u=notarialatina.com/partners/{{Auth::user()->slug}}&display=popup" style="color: #ffffff; background-color: #3b5998">Compartir mi perfil en Facebook <i class="fab fa-facebook-square"></i></a>  
            </div>
          @endif

        </div>
      </section>

      <div class="modal fade" id="modalcontract" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #002542">
              <h5 class="modal-title" id="staticBackdropLabel">Claúsulas de Aceptación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container py-4 px-2 text-justify">
                <h6 dir="ltr"><strong>POL&Iacute;TICAS DE PRIVACIDAD Y COOKIES</strong></h6>
                <h6>PRIVACIDAD</h6>
                <p style="font-weight: bold; font-size: 13px">1. Uso, finalidad y régimen jurídico aplicable</p>
                <p style="font-size:13px">
                    Notaría Pública Latina supone un mecanismo de interactuación y soporte para abogados y potenciales clientes de los mismos 
                    que se rige por el derecho americano y en concreto y en cuanto al tratamiento de datos de carácter personal, por la vigente 
                    normativa del Comité Jurídico Interamericano OEA/Ser.Q CJI/doc. 474/15 rev.2 26 marzo 2015 de protección de datos personales
                     de las personas físicas.
                </p>
                <p style="font-size:13px">
                    Se informa que todos los datos personales que el Usuario facilite a través de este sitio Web serán tratados por Notaría Pública
                     Latina en calidad de responsable del tratamiento, (en adelante, "Notaría Pública Latina") para las siguientes finalidades:
                </p>
                <ul style="font-size:13px">
                    <li>
                        Posibilitar la prestación de los servicios solicitados; Prestar un servicio personalizado para poner en contacto a los 
                        clientes potenciales con otros abogados del directorio. Identificar el sector del problema del cliente y enfocarle hacia
                        la mejor solución por sectores del derecho. La base jurídica para llevar a cabo este tratamiento de datos es la ejecución
                        de las obligaciones contractuales asumidas por el Usuario y Notaría Pública Latina en el Sitio Web. 
                    </li>
                    <li>
                        Para el caso de solicitudes efectuadas por un Usuario que no mantenga una relación contractual con Notaría Pública Latina,
                        la base jurídica es el consentimiento del Usuario implícito en su solicitud a los efectos de que Notaría Pública Latina pueda 
                        atenderla. Los datos tratados con esta finalidad se conservarán mientras se mantenga dicha relación y, una vez finalizada ésta, 
                        durante los plazos de conservación y de prescripción de responsabilidades legalmente previstos. 
                    </li>
                    <li>
                        Mantenerle informado acerca de las noticias relacionadas con Notaría Pública Latina, así como de los productos y servicios 
                        comercializados tanto por Notaría Pública Latina como por terceras entidades pertenecientes o dirigidas al sector jurídico. 
                        La base jurídica para llevar a cabo este tratamiento de datos es el consentimiento del Usuario. Los datos tratados con esta 
                        finalidad se conservarán hasta el momento en que el Usuario retire su consentimiento. El Usuario podrá en todo momento indicar 
                        expresamente si autoriza o no dicho tratamiento de sus datos a través del contacto que se indica a continuación.
                    </li>
                    <li>
                        Realizar encuestas de satisfacción y calidad sobre el servicio de Notaría Pública Latina. Dichas encuestas podrán ir dirigidas
                        tanto a Usuarios abogados como a Usuarios clientes o potenciales clientes de aquéllos. La base jurídica para llevar a cabo este
                        tratamiento de datos es el interés legítimo. Los datos tratados con esta finalidad se guardarán durante los plazos de conservación
                        y de prescripción de responsabilidades legalmente previstos. El Usuario podrá en todo momento indicar expresamente si autoriza o no
                        dicho tratamiento de sus datos. 
                    </li>
                </ul>
            
                <p style="font-weight: bold; font-size:13px">2. Destinatarios y categorías de Encargados del tratamiento</p>
                <p style="font-size:13px">
                    Los datos podrán comunicarse a los siguientes destinatarios terceros: Administraciones Públicas para el cumplimiento de obligaciones legales;
                    a abogados para la ejecución de los servicios; a Entidades bancarias para la gestión de cobros y pagos de facturas; y a Encargados del tratamiento 
                    debidamente seleccionados. Asimismo, Notaría Pública Latina podrá transferir los datos a Encargados del Tratamiento ubicados en terceros países, 
                    para la prestación de servicios de atención al usuario, con los que ha suscrito el correspondiente clausulado tipo de la Organización de los Estados Americanos, 
                    una copia del cual puede ser solicitado a info@notarialatina.com
                </p>
                
                <p style="font-weight: bold; font-size:13px">3. Ejercicio de derechos del interesado</p>
                <p style="font-size:13px">
                    La presente política de privacidad propiedad de Notaría Pública Latina informa al interesado que podrá ejercer en cualquier momento los derechos de acceso, 
                    rectificación, supresión, limitación, oposición o portabilidad mediante correo electrónico dirigido a info@notarialatina.com o bien mediante escrito dirigido 
                    a Notaría Pública Latina, 67-03 Roosevelt Avenue, Woodside, NY 11377. En los tratamientos cuya legitimación se base en el consentimiento, el Usuario tiene el 
                    derecho a retirar dicho consentimiento en cualquier momento, sin que ello afecte a la licitud del tratamiento basado en el consentimiento previo a su retirada. 
                    El interesado tendrá derecho a presentar reclamación ante la autoridad de control. Le informamos que no facilitar la información solicitada puede implicar la 
                    imposibilidad de formalizar o dar cumplimiento al objeto del contrato. Puede contactar con nuestro Delegado de Protección de Datos en info@notarialatina.com, 
                    o bien dirigiendo su solicitud a Notaría Pública Latina, 67-03 Roosevelt Avenue, Woodside, NY 11377, a su atención.
                </p>
            
                <p style="font-weight: bold; font-size:13px">4. Notaría Pública Latina como encargado del tratamiento</p>
                <p style="font-size:13px">
                    Notaría Pública Latina tendrá la consideración de encargado del tratamiento de todos aquellos datos personales titularidad del Usuario Abogado a los que tenga 
                    acceso durante la prestación de los servicios solicitados por ellos. En este sentido, Notaría Pública Latina se obliga a:
                </p>
                <ul style="font-size:13px">
                    <li>
                        Tratar los datos personales únicamente siguiendo instrucciones documentadas del Usuario Abogado, inclusive con respecto a las transferencias de datos personales, 
                        salvo que esté obligado a ello en virtud del Derecho de la Unión o de los Estados miembros; en tal caso, Notaría Pública Latina informará al Cliente de esa exigencia 
                        legal previa al tratamiento, salvo que tal derecho lo prohíba por razones importantes de interés público; 
                    </li>
                    <li>
                        Garantizar que las personas autorizadas para tratar datos personales se hayan comprometido a respetar la confidencialidad o estén sujetas a una obligación de 
                        confidencialidad de naturaleza estatutaria; 
                    </li>
                    <li>
                        Cuando el Encargado recurra a otro encargado para llevar a cabo determinadas actividades de tratamiento por cuenta del Cliente, impondrá a este otro encargado, 
                        mediante contrato, las mismas obligaciones de protección de datos que las estipuladas en este Contrato; 
                    </li>
                    <li>
                        Asistir al Cliente, teniendo en cuenta la naturaleza del tratamiento, a través de medidas técnicas y organizativas apropiadas, siempre que sea posible, 
                        para que éste pueda cumplir con su obligación de responder a las solicitudes que tengan por objeto el ejercicio de los derechos de los interesados. La 
                        comunicación debe hacerse de forma inmediata y en ningún caso más allá del día laborable siguiente al de la recepción de la solicitud, juntamente, en su caso, 
                        con la información que pueda ser relevante para atender la solicitud. 
                    </li>
                    <li>
                        Ayudar al Cliente a garantizar el cumplimiento de las obligaciones establecidas en los artículos 32 a 36 de el Reglamento, teniendo en cuenta la naturaleza del
                        tratamiento y la información a disposición del encargado; 
                    </li>
                    <li>
                        Salvo que el Cliente indique otra cosa, suprimir todos los datos personales una vez finalice la prestación de los Servicios, así como suprimir las copias existentes, 
                        a menos que se requiera la conservación de los datos personales en virtud del Derecho de la Unión o de los Estados miembros; 
                    </li>
                    <li>
                        Poner a disposición del Cliente toda la información necesaria para demostrar el cumplimiento de las obligaciones establecidas en el artículo 28 del Reglamento; 
                    </li>
                    <li>
                        Informar inmediatamente al Cliente si, en opinión del Encargado, una instrucción infringe el Reglamento u otras disposiciones en materia de protección de datos 
                        de la Unión o de los Estados miembros; 
                    </li>
                    <li>
                        Cumplir con cualquier otra obligación que le corresponda conforme a la normativa vigente de protección de datos. 
                    </li>
                    <li>
                        Notificar al Cliente, cualquier violación de la seguridad de los datos personales de la que tenga conocimiento, juntamente con toda la información relevante 
                        para la documentación, resolución y comunicación de la incidencia. 
                    </li>
                </ul>
            
                <p style="font-weight: bold; font-size:13px">5. Publicación de opiniones</p>
                <p style="font-size:13px">
                    El Usuario sabe y acepta que al publicar una opinión sobre un abogado o despacho, la imagen y el nombre de Usuario de su perfil en la red social que haya utilizado 
                    para autenticarse aparecerán publicados junto a su opinión en el Sitio Web. Además, mientras la opinión permanezca publicada, Notaría Pública Latina conservará 
                    internamente el e-mail, la IP y el identificador de red social del Usuario. La opinión publicada es accesible a cualquier Usuario que acceda al Sitio Web y quiera 
                    ver las opiniones realizadas sobre un determinado abogado o despacho. 
                </p>
            
                <h6>COOKIES</h6>
                <p style="font-weight: bold; font-size:13px">1. Uso de cookies en el Sitio Web Notaría Pública Latina</p>
                <p style="font-size:13px">
                    Este Sitio Web utiliza cookies propias y de terceros para mejorar los servicios ofrecidos en el mismo y mostrar al Usuario publicidad relacionada con sus preferencias 
                    mediante el análisis de sus hábitos de navegación. Si el Usuario continúa navegando, consideramos que acepta su uso. A los efectos de esta política, “continuar navegando” 
                    significa hacer clic en cualquier botón, casilla de verificación o enlace del sitio web; descargar cualquier contenido del mismo o hacer scroll.
                </p>
            
                <p style="font-weight: bold; font-size:13px">2. Definición de las cookies</p>
                <p style="font-size:13px">
                    Las cookies son un conjunto de datos que un servidor deposita en el navegador del Usuario y que puede solicitar posteriormente para reconocerle a lo largo de una serie 
                    de visitas. Es decir, se trata de un pequeño archivo de texto que queda almacenado en el disco duro del ordenador y que sirve para identificar al Usuario cuando se conecta 
                    nuevamente al sitio web. Su objetivo es registrar la visita del Usuario y guardar cierta información.
                </p>
                <p style="font-size:13px">
                    Una cookie es un fichero que se descarga en el ordenador del Usuario cuando accede a determinados sitios web, como por ejemplo, éste. Las cookies permiten a dichos sitios web, 
                    entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación del Usuario o los de su equipo y, dependiendo de la información que contengan y de la forma 
                    en que utilice su equipo, pueden utilizarse para reconocer al Usuario.
                </p>
            
                <p style="font-weight: bold; font-size:13px">3. ¿Qué tipos de cookies existen?</p>
                <p style="font-size:13px">
                    En base a su duración, las cookies pueden clasificarse en "cookies de sesión" y en "cookies permanentes". Las cookies de sesión desaparecen del equipo del Usuario cuando éste 
                    abandona el sitio web visitado o cierra su navegador. Normalmente se almacenan en la memoria caché del equipo. Por su parte, las cookies permanentes se almacenan en el disco 
                    duro del equipo del Usuario de forma permanente o prolongada, de modo que el sitio web que la ha lanzado puede leerla cada vez que el Usuario lo visita de nuevo. La fecha de 
                    caducidad de este tipo de cookies viene determinada por el sitio web que las lanza.
                </p>
            
                <p style="font-weight: bold; font-size:13px">4. Uso de cookies por Notaría Pública Latina</p>
                <p style="font-size:13px">Notaría Pública Latina informa al Usuario que el presente sitio web utiliza cookies para las siguientes finalidades:</p>
                <ul style="font-size:13px">
                    <li>
                        Cookies propias de Notaría Pública Latina utilizadas para controlar las peticiones de autentificación de páginas web basada en java; ayudar a mantener asociada 
                        la sesión del Usuario en el sitio web; detectar las características del navegador del Usuario y mejorar su experiencia de uso. 
                    </li>
                    <li>
                        Cookies de Google Analytics utilizadas para medir el comportamiento del Usuario; almacenar su número de visitas y analizar lo rápido que el Usuario abandona el sitio web. 
                    </li>
                </ul>
            
                <p style="font-weight: bold; font-size:13px">5. ¿Qué tipos de cookies utiliza este Sitio Web?</p>
                <p style="font-size:13px">
                    Cookies de análisis: Son aquéllas que, bien tratadas por Nptaría Pública Latina o por terceros, permiten cuantificar el número de Usuarios y así realizar la medición 
                    y análisis estadístico de la utilización que éstos hacen del Sitio Web. Para ello se analiza su navegación en el Sitio Web con el fin de mejorar la oferta de productos, 
                    servicios o contenidos que se muestran en el mismo. Cookies publicitarias: Son aquéllas que permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios que, 
                    en su caso, el editor haya incluido en el Sitio Web en base a criterios como el contenido editado o la frecuencia en la que se muestran los anuncios.
                </p>
                <p style="font-size:13px">
                    Cookies de publicidad comportamental: Son aquéllas que permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios que, en su caso, el editor haya incluido 
                    en una página web, aplicación o plataforma desde la que presta el servicio solicitado. Estas cookies almacenan información del comportamiento de los Usuarios obtenida a través de 
                    la observación continuada de sus hábitos de navegación, lo que permite desarrollar un perfil específico para mostrar publicidad en función del mismo.
                </p>
                <p style="font-size:13px">
                    En concreto, este Sitio Web utiliza:
                </p>
                <ul style="font-size:13px">
                    <li>
                        Google Analytics, herramienta de analítica ofrecida por el tercero Google Inc., sito en Estados Unidos. Google Analytics utiliza cookies propias para notificar las interacciones 
                        de los Usuarios en el Sitio Web, almacenando información de identificación no personal. Los navegadores no comparten cookies de origen a través de distintos dominios. El Usuario 
                        puede ampliar esta información sobre el uso de cookies en Google Analytics. 
                    </li>
                    <li>
                        Google Dynamic Remarketing, herramienta de remarketing ofrecida por el tercero Google Inc., sito en Estados Unidos. Mediante el remarketing dinámico y la inserción de las 
                        correspondientes cookies en el navegador del Usuario, éste podrá visualizar publicidad relacionada con los contenidos visitados en el Sitio Web, incluso cuando ya no esté 
                        navegando por el mismo. El Usuario puede ampliar esta información sobre el uso de cookies en Google Dynamic Remarketing. 
                    </li>
                    <li>
                        Google AdSense, herramienta para la publicación de anuncios publicitarios ofrecida por el tercero Google Inc., sito en Estados Unidos. Google AdSense utiliza cookies 
                        para orientar la publicidad según el contenido que es relevante para el Usuario, mejorar los informes de rendimiento de la campaña y evitar mostrar anuncios que el 
                        Usuario ya haya visto. El Usuario puede ampliar esta información sobre el uso de cookies en Google AdSense. 
                    </li>
                    <li>
                        Google AdWords Conversion, es la herramienta de seguimiento de campañas de publicidad AdWords ofrecida por el tercero Google Inc., sito en Estados Unidos. Google AdWords 
                        Conversion utiliza cookies para ayudarnos a realizar un seguimiento de las ventas y de otras conversiones de los anuncios publicitarios que mostramos, añadiendo una cookie 
                        al ordenador del Usuario cuando este hace clic en un anuncio. Dicha cookie dura 30 días y no recopila ni realiza un seguimiento de información que pueda identificar al Usuario. 
                        El Usuario puede ampliar esta información sobre el uso de cookies en Google AdWords Conversion. 
                    </li>
                </ul>
            
                <p style="font-weight: bold; font-size:13px">6. ¿Puedo configurar la instalación de cookies en mi navegador?</p>
                <p style="font-size:13px">
                    El Usuario puede configurar su navegador para ser avisado de la recepción de cookies y, si lo desea, impedir su instalación en su equipo. Asimismo, el Usuario puede revisar en su 
                    navegador qué cookies tiene instaladas y cuál es el plazo de caducidad de las mismas, pudiendo eliminarlas. Por favor, para ampliar esta información consulte las instrucciones y 
                    manuales de su navegador. En caso de que el Usuario no permita el uso de cookies durante su navegación por este sitio web, Notaría Pública Latina no garantiza que la información 
                    aparecida durante la navegación por el mismo sea exacta, completa o, incluso, que la navegación sea técnicamente posible o viable.
                </p>
            
                <p style="font-weight: bold; font-size:13px">7. ¿Cómo puede el Usuario bloquear o eliminar las cookies que utiliza este sitio web?</p>
                <p style="font-size:13px">
                    El Usuario puede permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador. Si el Usuario 
                    no desea que sus datos se recopilen con Google Analytics, puede instalar un complemento de inhabilitación para navegadores. El hecho de bloquear la instalación 
                    de las cookies descritas en esta política no impide la efectiva utilización del Sitio Web por parte del Usuario.
                </p>
                <p style="font-size:13px">
                    Para permitir, conocer, bloquear o eliminar las cookies instaladas en tu equipo puedes hacerlo mediante la configuración de las opciones del navegador instalado en su ordenador. 
                    Por ejemplo puedes encontrar información sobre cómo hacerlo en el caso que uses como navegador:
                </p>
                <ul style="font-size:13px">
                    <li>Firefox</li>
                    <li>Chrome</li>
                    <li>Explorer</li>
                    <li>Safari</li>
                    <li>Opera</li>
                </ul>
            </div>
            </div>
            <div class="modal-footer text-center">
              <button type="button" class="btn rounded-0 text-white" style="background-color: #002542" data-dismiss="modal">Entendido</button>
            </div>
          </div>
        </div>
      </div>



@endsection

@section('end-scripts')
    
@endsection