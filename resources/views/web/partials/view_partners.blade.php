@include('web.partials.filters_partners')
<div class="mt-5 contenido">
    @if (count($partners) > 0)
        @if(count($featured)>0)
        <section>
            <section class="row">
                <div class="col-12 col-sm-12 col-md-3 d-flex align-items-center">
                    <div>
                        <span class="h4" style="color: #002542">ABOGADOS</span> <span class="h4" style="color: #FEB124"> DESTACADOS</span>
                        <p>Abogados con más consultas de este mes en {{ $country_aux->name_country }}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9">
                    <div class="row justify-content-center">

                        {{-- mobile --}}
                        <div class="cardsMobileFeatured container d-none">
                            @foreach ($featured as $fmobile)
                                <div class="card shadow-sm d-flex mb-2 bg-light rounded-0">
                                    <div class="card-body d-flex position-relative">
                                        <img class="lazyload img-fluid" width="80px" data-src="{{ asset('storage/'.$fmobile->img_profile) }}" alt="">
                                        <div class="ml-3 w-100">
                                            <h5 class="card-title">{{ $fmobile->name . " " . $fmobile->lastname }}</h5>
                                            <p class="card-text">{{ $fmobile->state . ", " . $fmobile->city }}</p>
                                            <a href="{{ route('web.showpartner', $fmobile->slug) }}" class="btn font-weight-bold float-right rounded-0 shadow-sm" style="background-color: #002542; color: #ffffff">Ver perfil</a>
                                        </div>
                                        <div class="position-absolute" style="top: -4px; right: 0px">
                                            <span class="bg-warning rounded-0 px-2 pb-1 text-white" style="font-size: small">Destacado</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @foreach ($featured as $f)
                            <!--desktop-->
                            <div class="col-sm-4 cardsDesktopFeatured">
                                <div class="position-relative">
                                    <section class="container-image">
                                        <section style="height: 350px; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url({{asset('storage/'.$f->img_profile)}});"></section>
                                    </section>
                                    <div 
                                        class="position-absolute d-flex justify-content-center" 
                                        style="width: 100%; bottom: 20px"
                                    >
                                        <p class="text-white font-weight-bold">{{ $f->name . " " . $f->lastname}} <br> {{ $f->state . ", " . $f->city}}</p>
                                    </div>
                                </div>
                                <a class="btn btn-warning shadow-sm mt-3 btn-block font-weight-bold" href="{{ route('web.showpartner', $f->slug) }}">VER PERFIL</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </section>
        @else
        <section>
            <p>No hay destacados</p>
        </section>
        @endif
        <section class="mt-5 pl-3 shadow-sm" style="border-left: 5px solid #fec200;">
            <p class="py-2">Encontramos <span style="font-weight: 500">{{ $count_partners }}</span> abogados que residen en <span style="font-weight: 500">{{ $country_aux->name_country }}</span></p>
        </section>
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                    <a href="{{ route('web.showpartner', $partner->slug) }}" style="text-decoration: none">
                        <article class="testimotionals">
                            <div class="card rounded-0 shadow-sm" style="width: 100%; height: 100%">
                            <div class="layer"></div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-6 col-sm-12">
                                        <div class="image">
                                            <img class="lazyload rounded" width="125px" height="150px" data-src="{{ asset('storage/'.$partner->img_profile) }}" alt="">
                                        </div>
                                    </div>
                                    <div id="rowDataPartner" class="col-6 col-sm-12">
                                        <p class="namepartner" style="font-size: 13px; text-align: left" class="txtNamePartner dismissMarginTopBottom">
                                            <b>{{ Str::ucfirst($partner->name) }} {{ Str::ucfirst($partner->lastname) }}</b>
                                        </p>
                                        {{-- <p>{{ $partner->specialty }}</p> --}}
                                        @foreach ($partner->specialties as $specialty)
                                        <div class="d-inline txtDataPartner dismissMarginTopBottom" style="font-size: 12px">
                                            • {{ $specialty->name_specialty }}
                                        </div>
                                        @endforeach
                                        <p style="font-size: 13px" class="mt-2 txtDataPartner dismissMarginTopBottom h6"><b>{{ $partner->country_residence }} <img src="{{ asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png') }}"/></b></p>
                                        @if ($partner->state != null)
                                            <p style="font-size: 13px" class="txtDataPartner dismissMarginTopBottom h6"><b>{{ Str::ucfirst($partner->state) }}</b></p>
                                        @endif
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <p class="txtDataPartner"><i class="fas fa-phone-alt"></i> {{ Str::limit($partner->codigo_pais . ' ' . $partner->phone, 11, '...') }}</p>
                                            </div>
                                            <br>
                                        </div>	
                                        {{-- <div class="row" style="margin-top: -15px">
                                            <div class="col-sm-12">
                                                <p class="txtDataPartner" style="font-size: 10px"><i class="far fa-envelope" style="margin-right: 5px;"></i>{{ Str::limit($partner->email, 42, '...') }}</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $partners->links() }}
        </div>
        @else
            <div class="row d-flex text-align-center justify-content-center mx-3">
                <div class="alert alert-info rounded-0 font-weight-bold text-center">
                    <p style="font-size: 20px">¡Lo sentimos!</p>
                    <p>Por el momento no encontramos registros en estas zonas</p>
                </div>        
            </div>
        @endif
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#formSearchPartnersAfter').submit(function(event){
        event.preventDefault();
        const countryId = $("#pais").val();
        const specialty = $('#specialty').val();
        const state = $('#stateSelect').val();
        console.log("countryID: " + countryId + " | specialty: " + specialty + " | state: " + state);
        $('#contentPartner').html("<div class='loading text-center img-fluid'><img width='400px' height='400px' src='{{ asset('img/loader.gif') }}' alt='loading' /></div>");
        $.ajax({
            type: "GET",
            url: "{{ route('partners.fetch.state.b') }}",
            data: {
                "pais" : countryId,
                "specialty" : specialty,
                "state" : state
            },
            dataType: "json",
            success: function(result){
                $('#contentPartner').html(result.viewPartners);
                Country.setCountryId(countryId);
                //Cambiar el parametro de la url
                var queryParams = new URLSearchParams(window.location.search);
                // Set new or modify existing parameter value. 
                //queryParams.set("pais", countryId); 
                // Replace current querystring with the new one.
                //history.replaceState(null, null, "?"+queryParams.toString());
                if(state != "") $("#stateSelect").css({'background-color':'#002542', 'color':'#ffffff'});
                else $("#stateSelect").css({'background-color':'#ffffff', 'color':'#000000'});

                if(specialty != "") $("#specialty").css({'background-color':'#002542', 'color':'#ffffff'});
                else $("#specialty").css({'background-color':'#ffffff', 'color':'#000000'});
            
            },
            error: function(xhr, status, error){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                if(xhr.status == 419){
                    alert('Por favor recargue la página');
                }
            }
        });
    });

    // function cargarMas(){
    //     var id = $('#country').val();
    //     $.ajax({
    //             type: "POST",
    //             url: "{{ route('partners.fetch.state') }}",
    //             data: {
    //                 "_token" : "{{ csrf_token() }}",
    //                 "country" : id,
    //                 "state" : null,
    //                 "specialty": null,
    //                 "dataLoad": "{{ count($partners) }}"
    //             },
    //             dataType: "json",
    //             success: function(result){
    //                 $('#contentPartner').html(result.viewPartners);
    //             },
    //             error: function(xhr, status, error){
    //                 var errorMessage = xhr.status + ': ' + xhr.statusText
    //                 if(xhr.status == 419){
    //                     alert('Por favor recargue la página');
    //                 }
    //             }
    //         });
    // }

</script>