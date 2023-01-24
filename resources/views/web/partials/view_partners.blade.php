@include('web.partials.filters_partners')
<div class="mt-5 contenido" style="margin-left:10%; margin-right: 10%;">
    @if (count($partners) > 0)
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                    <a href="{{ route('web.showpartner', $partner->slug) }}" style="text-decoration: none">
                        <div class="testimotionals">
                            <div class="card" style="width: 100%; height: 100%">
                            <div class="layer"></div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-6 col-sm-12">
                                        <div class="image">
                                            <img class="lazyload" width="125px" height="150px" data-src="{{ asset('storage/'.$partner->img_profile) }}" alt="">
                                        </div>
                                    </div>
                                    <div id="rowDataPartner" class="col-6 col-sm-12">
                                        <h5 style="font-size: 13px; text-align: left" class="txtNamePartner dismissMarginTopBottom">
                                            <b>{{ Str::ucfirst($partner->name) }} {{ Str::ucfirst($partner->lastname) }}</b>
                                        </h5>
                                        {{-- <p>{{ $partner->specialty }}</p> --}}
                                        @foreach ($partner->specialties as $specialty)
                                        <div class="d-inline txtDataPartner dismissMarginTopBottom" style="font-size: 12px">
                                            • {{ $specialty->name_specialty }}
                                        </div>
                                        @endforeach
                                        <h6 class="mt-2 txtDataPartner dismissMarginTopBottom"><b>{{ $partner->country_residence }} <img src="{{ asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png') }}"/></b></h6>
                                        @if ($partner->state != null)
                                            <h6 class="txtDataPartner dismissMarginTopBottom"><b>{{ Str::ucfirst($partner->state) }}</b></h6>
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
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $partners->links() }}
        </div>
        @else
            <div class="row d-flex text-align-center justify-content-center">
                <div class="alert alert-success">
                    <h4>Por el momento no encontramos registros en estas zonas</h4>
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