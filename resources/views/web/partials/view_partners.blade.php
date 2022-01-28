<div>
    <p class="text-center mt-5">Solicite los servicios de un abogado <br> en Latinoamérica</p>
</div>
<hr style="width: 50%">
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
        <div style="display: inline-block" class="mr-2">
            <p><b>BUSCAR POR:</b></p>
        </div>
        
        {{-- <form action="{{ route('web.showallpartners.a') }}" method="POST" id="formSearchPartnersAfter"> --}}
        {!! Form::open(['route' => 'web.showallpartners', 'method' => 'POST', 'id' => 'formSearchPartnersAfter']) !!}
            {{-- @csrf --}}
            <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <select class="form-control" name="country" id="country" onchange="loadStates();">
                        <option value="">País</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if(Request::get('country') == $country->id) selected @endif>{{ $country->name_country }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <select class="form-control" name="state" id="stateSelect"> 
                        <option value="">Estado</option>
                        <option value="">Todos</option>
                        @foreach ($states as $state)
                            <option value="{{$state->name_state}}" @if(Request::get('state') == $state->name_state) selected @endif>{{ $state->name_state}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <select class="form-control" name="specialty" id="specialty">
                        <option value="">Especialidad</option>
                        <option value="">Todos</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->name_specialty }}" @if(Request::get('specialty') == $specialty->name_specialty) selected @endif>{{ $specialty->name_specialty}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="btn" type="submit" style="background-color: #002542; color: #ffffff">Buscar</button>
            </div>
            </div>
        {{-- </form> --}}
        {!! Form::close() !!}
    </div>
</div>
<div class="mt-5 contenido" style="margin-left:10%; margin-right: 10%;">
    @if (count($partners) > 0)
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ route('web.showpartner', $partner->slug) }}" target="_blank">
                        <div class="testimotionals">
                            <div class="card mb-3">
                            <div class="layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img class="lazyload" width="125px" height="150px" data-src="{{ asset('storage/'.$partner->img_profile) }}" alt="">
                                </div>
                                <h5>
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
                                <div class="d-inline" style="font-size: 14px">
                                    • {{ $specialty->name_specialty }}
                                </div>
                                @endforeach
                                <h6 class="mt-2"><b>{{ $partner->country_residence }} <img src="{{ asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png') }}"/></b></h6>
                                @if ($partner->state != null)
                                    <h6><b>{{ $partner->state }}</b></h6>
                                @endif
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <p><i class="fas fa-phone-alt"></i> {{ $partner->codigo_pais }} {{ $partner->phone }}</p>
                                    </div>
                                    <br>
                                </div>	
                                <div class="row" style="margin-top: -15px">
                                    <div class="col">
                                        <p style="font-size: 10px"><i class="far fa-envelope" style="margin-right: 5px;"></i>{{ $partner->email }}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @else
            <div class="row d-flex text-align-center justify-content-center">
                <div class="alert alert-success">
                    <h4>No se encontraron registros</h4>
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
                alert('Error - ' + errorMessage);
            }
        });
    });
</script>