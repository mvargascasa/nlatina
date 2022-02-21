<div class="row justify-content-center" style="position: relative">
    <img id="imgBanner" style="width: 100%; height: 250px;"  src="{{ asset('img/partners/FONDO-PARTNERS.webp') }}" alt="">
    <div id="imgPareja" style="position: absolute; bottom: 0; left: 0; margin-left: 25%;">
        <img style="width: 40%; bottom: 0" class="img-fluid float-rigth" src="{{ asset('img/partners/PAREJA NUEV-04.webp') }}" alt="">
    </div>
    <div class="row" style="position: absolute; top: 35%">
        <div class="col-4 col-sm-4">
        </div>
        <div class="col-8 col-sm-8 text-center">
            <h4 id="txtBanner" style="color: #505151; font-weight: bold">Elija profesionales jurídicos que puedan solucionar sus requerimientos legales desde <b style="color: #3d3c3c">Estados Unidos</b></h4> 
        </div>
    </div>
</div>
<div style="background-color: #f4f4f4" class="pb-5 mt-3">
    <div class="text-center">
        {{-- <h4 style="font-family: Antic Didone">Contamos con un equipo de <b style="font-weight:normal ;color: rgb(137, 98, 63)"> Abogados y Notarios</b> en toda Latinoamérica</h4> --}}
        <h6 style="font-family: sans-serif">SELECCIONE UN PAÍS</h6>
        <hr style="width: 85%">
    </div>
    <div class="container mt-4">
        {!! Form::open(['id' => 'formSearchPartner']) !!}
        <div class="row countrysearch" style="margin-left: 13%">
            @php
                $countries = \App\Country::select('id', 'name_country', 'name_country_lower')->orderBy('name_country')->get();
            @endphp
            @foreach ($countries as $country)
                @if ($country->name_country != "Estados Unidos" && $country->name_country != "España")
                    <div onclick="selectCountry({{ $country->id }})" style="cursor: pointer" class="col-sm-4 col-6 mb-2">
                        <img src="{{ asset('img/partners/'.$country->name_country_lower.'.png') }}" alt=""> {{ $country->name_country}}
                    </div>    
                @endif
            @endforeach
            {{----}}
        </div>
        <input type="hidden" name="country" id="country">
        {!! Form::close() !!}
    </div>
</div>