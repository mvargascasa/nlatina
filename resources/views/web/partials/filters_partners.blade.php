<div class="text-center">
    {{-- <img style="width: 100%; height: 200px;" src="{{ asset('img/partners/FONDO-PARTNERS.jpg') }}" alt=""> --}}
    <div id="rowTxt" style="margin-left: auto; margin-right: auto; padding-top: 2%; left: 0; right: 0; text-align: center">
        <h5 style="font-weight: bold">Encuentre un Abogado o Notario en Latinoamérica</h5>
        <p style="font-size: 13px">BUSCAR POR:</p>
    </div>
    <div id="rowPatternFiltros" class="row" style="margin-left: auto; margin-right: auto; top: 50%; left: 0; right: 0; text-align: center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            {!! Form::open(['route' => 'web.showallpartners', 'method' => 'POST', 'id' => 'formSearchPartnersAfter']) !!}
                <div id="rowFiltros" class="row d-flex justify-content-center" style="margin-left: 25%; margin-right: 23%">
                    <div class="col-4 col-lg-3" style="margin-left: -22px">    
                        <div id="filterCountry" class="form-group">
                            <select class="form-control" name="country" id="country" onchange="loadStates();" style="border: none; border-radius: 0px; z-index: 1; height: 31px; font-size: 14px;">
                                <option value="">País</option>
                                @foreach ($countries as $country)
                                    @if ($country->name_country != "Estados Unidos" && $country->name_country != "España")
                                        <option value="{{ $country->id }}" @if(Request::get('country') == $country->id) selected @endif>{{ $country->name_country }}</option>
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
                <div style="margin-left: auto; margin-right: auto; text-align: center">
                    <button id="btnBuscar" class="btn" type="submit" style="background-color: #fec200; color: #000000; width: 130px; height: 25px; font-size: 13px; font-weight: bold; padding-top: 2px; border-radius: 0px;">BUSCAR</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>