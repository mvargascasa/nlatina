<section style="background-image: url('img/partners/FONDO-PARTNERS.webp'); background-size: cover;" class="row justify-content-center">
    {{-- <img id="imgBanner" style="width: 100%; min-height: 300px;"  src="{{ asset('img/partners/FONDO-PARTNERS.webp') }}" alt=""> --}}
    <div id="imgPareja" class="row justify-content-center align-items-center pt-3">
        <div class="col-12 col-sm-6">
            <img style="width: 60%; height: auto; bottom: 0" class="img-fluid float-rigth" src="{{ asset('img/partners/PAREJA NUEV-04.webp') }}" alt="">
        </div>
        {{-- <div class="row"> --}}
            {{-- <div class="col-4 col-sm-4">
            </div> --}}
            <div class="col-12 col-sm-6">
                {{-- <h4 id="txtBanner" style="color: #505151; font-weight: bold">Elija profesionales jurídicos que puedan solucionar sus requerimientos <b style="color: #3d3c3c">en Latinoamérica</b></h4>  --}}
                <a href="#search-partner" style="background-color: #2B384D; color: #FEC034" class="btn rounded-pill btn-block" style="font-size: 20px"><b>¿NECESITA UN</b> ABOGADO?</a> 
                <a href="{{ route('partners.registro') }}" style="background-color: #2B384D; color: #FEC034" class="btn rounded-pill btn-block" style="font-size: 20px"><b>¿ES</b> ABOGADO?</a>
            </div>
        {{-- </div> --}}
    </div>
</section>

<section class="text-center py-5">
    <h4 class="text-color-blue">ENCUENTRE EL ABOGADO QUE NECESITA</h4>
    <p class="text-color-blue">Elija profesionales jurídicos que puedan solucionar sus requerimientos</p>
</section>

<section style="background-color: #f8f8f8" class="py-5 mt-3" id="search-partner">
    <div class="text-center">
        {{-- <h4 style="font-family: Antic Didone">Contamos con un equipo de <b style="font-weight:normal ;color: rgb(137, 98, 63)"> Abogados y Notarios</b> en toda Latinoamérica</h4> --}}
        <h6 style="font-family: sans-serif" class="text-color-blue"><b>SELECCIONE</b> EL PAÍS</h6>
        <hr style="width: 85%">
    </div>
    <div class="container mt-4">
        {{-- <form action="{{ route('partners.fetch.state') }}" method="GET" id="formSearchPartner"> --}}
            <div class="row countrysearch">
                @php
                    $countries = \App\Country::select('id', 'name_country', 'name_country_lower')->orderBy('name_country')->get();
                @endphp
                @foreach ($countries as $country)
                    @if ($country->name_country != "Estados Unidos" && $country->name_country != "España")
                    <div class="col-sm-4 col-6 mb-2 countries">
                        <a class="text-color-blue font-weight-bold" style="text-decoration: none;" href="{{route('partners.fetch.state', strtolower(Str::slug($country->name_country)))}}">
                            <div class="border border-warning mx-2 rounded-pill pl-2">
                                <img width="25" height="25" src="{{ asset('img/partners/'.$country->name_country_lower.'.png') }}" alt=""> {{ $country->name_country}}
                            </div>
                        </a>
                    </div>    
                    @endif
                @endforeach
            </div>
            <input id="countryHidden" type="hidden" name="country">
        {{-- </form> onclick="selectCountry('{{$country->name_country}}');"--}}
    </div>
</section>

{{-- section how it works --}}
<section>
    <div class="container my-5">
        <h4 class="text-color-blue text-center font-weight-bold">¿CÓMO FUNCIONA?</h4>
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                <div class="mr-3">
                    <i class="fas fa-map-marker-alt fa-3x"></i>
                </div>
                <div>
                    <div class="w-50">
                        <div class="bg-warning text-color-blue border-right-pill">
                            <p class="font-weight-bold px-3">PASO 1</p>
                        </div>
                        <p class="text-sm">Seleccionar el pais donde necesita su abogado</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                <div class="mr-3">
                    <i class="fas fa-user-graduate fa-3x text-color-blue"></i>
                </div>
                <div>
                    <div class="w-50">
                        <div class="bg-warning text-color-blue border-right-pill">
                            <p class="font-weight-bold px-3">PASO 2</p>
                        </div>
                        <p class="text-sm">Seleccionar el estado del país y la especialidad que necesita</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                <div class="mr-3">
                    <i class="fas fa-clipboard-list fa-3x"></i>
                </div>
                <div>
                    <div class="w-50">
                        <div class="bg-warning text-color-blue border-right-pill">
                            <p class="font-weight-bold px-3">PASO 3</p>
                        </div>
                        <p class="text-sm">Para realizar una consulta con el abogado deberá llenar el formulario</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <section class="row">
        <div class="col-sm-6" style="max-height: 500px; height: 400px; background-size: cover; background-position: center center; background-repeat: no-repeat ; background-image: url('{{ asset('img/partners/partners-img.jpg') }}');"></div>
        <div class="col-sm-6 d-flex align-items-center justify-content-center" style="background-color: #2B384D; color: #ffffff">
            <div class="px-5">
                <p class="font-weight-bold font-italic">Encontrar un buen abogado es esencial para garantizar que sus derechos e intereses estén protegidos en cuestiones legales</p>
                <p>Investigue su experiencia, reputación y antecedentes antes de contratarlo. Asegúrese de que su área de especialización se adapte a sus necesidades y que se sienta cómodo trabajando con él o ella. Pregunte sobre sus honorarios y cómo manejará su caso</p>
                <p>La elección del abogado adecuado puede marcar la diferencia en el resultado de su caso, por lo que es importante tomarse el tiempo para hacer una elección informada</p>
            </div>
        </div>
    </section>
</section>