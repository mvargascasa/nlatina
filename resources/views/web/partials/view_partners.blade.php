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
                        <div class="form-group">
                            <select class="form-control" name="country" id="country" onchange="loadStates();" style="border: none; border-radius: 0px; z-index: 1; height: 31px; font-size: 14px;">
                                <option value="">País</option>
                                @foreach ($countries as $country)
                                    @if ($country->name_country != "Estados Unidos")
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

<div class="mt-5 contenido" style="margin-left:10%; margin-right: 10%;">
    @if (count($partners) > 0)
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ route('web.showpartner', $partner->slug) }}">
                        <div class="testimotionals">
                            <div class="card mb-3">
                            <div class="layer"></div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-6 col-sm-12">
                                        <div class="image">
                                            <img class="lazyload" width="125px" height="150px" data-src="{{ asset('storage/'.$partner->img_profile) }}" alt="">
                                        </div>
                                    </div>
                                    <div id="rowDataPartner" class="col-6 col-sm-12">
                                        <h5 style="font-size: 13px; text-align: left" class="txtDataPartner dismissMarginTopBottom">
                                            <b>
                                                @if ($partner->title == "Abogado")
                                                Abg.
                                                @elseif($partner->title == "Licenciado")
                                                Lic.
                                                @endif
                                                {{ $partner->name }} {{ $partner->lastname }}
                                            </b>
                                        </h5>
                                        {{-- <p>{{ $partner->specialty }}</p> --}}
                                        @foreach ($partner->specialties as $specialty)
                                        <div class="d-inline txtDataPartner dismissMarginTopBottom" style="font-size: 12px">
                                            • {{ $specialty->name_specialty }}
                                        </div>
                                        @endforeach
                                        <h6 class="mt-2 txtDataPartner dismissMarginTopBottom"><b>{{ $partner->country_residence }} <img src="{{ asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png') }}"/></b></h6>
                                        @if ($partner->state != null)
                                            <h6 class="txtDataPartner dismissMarginTopBottom"><b>{{ $partner->state }}</b></h6>
                                        @endif
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <p class="txtDataPartner"><i class="fas fa-phone-alt"></i> {{ $partner->codigo_pais }} {{ $partner->phone }}</p>
                                            </div>
                                            <br>
                                        </div>	
                                        <div class="row" style="margin-top: -15px">
                                            <div class="col-sm-12">
                                                <p class="txtDataPartner" style="font-size: 10px"><i class="far fa-envelope" style="margin-right: 5px;"></i>{{ $partner->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @if (count($partners) < $totalPartners)
            <div class="text-center mt-3">
                <button style="background-color: #002542; color:#ffffff" class="btn" onclick="cargarMas();">Cargar más</button>
            </div>
        @endif
        @else
            <div class="row d-flex text-align-center justify-content-center">
                <div class="alert alert-success">
                    <h4>Por el momento no encontramos registros en estas zonas</h4>
                </div>        
            </div>
        @endif
</div>

<script>
    $('#formSearchPartnersAfter').submit(function(event){
        event.preventDefault();
        const countryId = $("#country").val();
        const specialty = $('#specialty').val();
        const state = $('#stateSelect').val();
        $('#contentPartner').html("<div class='loading text-center img-fluid'><img src='{{ asset('img/loader.gif') }}' alt='loading' /></div>");
        $.ajax({
            type: "POST",
            url: "{{ route('partners.fetch.state') }}",
            data: {
                "_token" : "{{ csrf_token() }}",
                "country" : countryId,
                "specialty" : specialty,
                "state" : state
            },
            dataType: "json",
            success: function(result){
                $('#contentPartner').html(result.viewPartners);
            },
            error: function(xhr, status, error){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                if(xhr.status == 419){
                    alert('Por favor recargue la página');
                }
            }
        });
    });

    function cargarMas(){
        var id = $('#country').val();
        $.ajax({
                type: "POST",
                url: "{{ route('partners.fetch.state') }}",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "country" : id,
                    "state" : null,
                    "specialty": null,
                    "dataLoad": "{{ count($partners) }}"
                },
                dataType: "json",
                success: function(result){
                    $('#contentPartner').html(result.viewPartners);
                },
                error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    if(xhr.status == 419){
                        alert('Por favor recargue la página');
                    }
                }
            });
    }

</script>