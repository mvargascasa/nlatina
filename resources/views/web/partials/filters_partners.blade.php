<div class="text-center">
    {{-- <img style="width: 100%; height: 200px;" src="{{ asset('img/partners/FONDO-PARTNERS.jpg') }}" alt=""> --}}
    <div id="rowTxt" class="pt-5 mb-5">
        <p class="h4" style="font-weight: 700 !important"> <span style="color: #002542">FILTRAR BÚSQUEDA MÁS DETALLADA PARA</span> <span style="color: #fec200">"ABOGADOS EN {{ strtoupper($country_aux->name_country) }}"</span></p>
        {{-- <p style="font-size: 14px" class="mt-4">Seleccione un estado y una especialidad para una búsqueda más detallada  :</p> --}}
        <p style="font-size: 16px; color: #002542" class="mt-4">Elija profesionales jurídicos que puedan solucionar sus requerimientos</p>
    </div>
    <div id="rowPatternFiltros" class="row" style="margin-left: auto; margin-right: auto; left: 0; right: 0; text-align: center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            {!! Form::open(['route' => 'web.showallpartners', 'method' => 'POST', 'id' => 'formSearchPartnersAfter']) !!}
                <div id="rowFiltros" class="row d-flex justify-content-center">
                    <div class="col-4 col-lg-3" style="margin-left: -22px">    
                        <div id="filterCountry" class="form-group">
                            <select class="form-control" name="pais" id="pais" onchange="changeurllocation(this);" style="border: none; border-radius: 0px; z-index: 1; height: 31px; font-size: 14px; @if(isset($country_aux)) background-color: #002542; color: #ffffff; @endif">
                                <option value="">País</option>
                                @foreach ($countries as $country)
                                    @if ($country->name_country != "Estados Unidos" && $country->name_country != "España")
                                        <option value="{{ $country->name_country }}" @if(isset($country_aux) && $country_aux->id == $country->id) selected @endif>{{ $country->name_country }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-lg-3" style="margin-left: -22px">
                        <div class="form-group">
                            <select class="form-control" name="state" id="stateSelect" style="border: none; border-radius: 0px; height: 31px; font-size: 14px"> 
                                <option value="">Estado</option>
                                <option value="">Todos</option>
                                @foreach ($states as $state)
                                    <option value="{{$state->name_state}}" @if(Request::get('state') == $state->name_state) selected @endif>{{ $state->name_state}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-lg-3" style="margin-left: -22px;">
                        <div class="form-group">
                            <select class="form-control" name="specialty" id="specialty" style="border: none; border-radius: 0px; height: 31px; font-size: 14px">
                                <option value="">Especialidad</option>
                                <option value="">Todos</option>
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->name_specialty }}" @if(Request::get('specialty') == $specialty->name_specialty) selected @endif>{{ $specialty->name_specialty}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div style="margin-left: auto; margin-right: auto; text-align: center" class="mt-4">
                    <button id="btnBuscar" class="btn" type="submit" style="background-color: #fec200; color: #000000; width: 130px; height: 25px; font-size: 13px; font-weight: bold; padding-top: 2px;">BUSCAR</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>