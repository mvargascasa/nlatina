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
                        <p class="mt-4 mb-1" style="font-weight: bold; font-size: .90rem;">No hay información que mostrar. Edita tu perfil para que puedas ver los cambios reflejados</p>
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
                        <p class="mt-4 mb-1" style="font-weight: bold; font-size: .90rem;">No hay información que mostrar. Edita tu perfil para que puedas ver los cambios reflejados</p>
                        @endif
                    </div>
                  </div>
                </div>
          </div>

          @if (Auth::user()->status == "PUBLICADO" && Auth::user()->link_facebook != null && Str::startsWith(Auth::user()->link_facebook, 'https'))
            <div class="mt-4">
              <a target="_blank" class="btn" href="https://www.facebook.com/sharer/sharer.php?u=notarialatina.com/partners/{{Auth::user()->slug}}&display=popup" style="color: #ffffff; background-color: #3b5998">Compartir mi perfil en Facebook <i class="fab fa-facebook-square"></i></a>  
            </div>
          @endif

        </div>
      </section>
@endsection

@section('end-scripts')
    
@endsection