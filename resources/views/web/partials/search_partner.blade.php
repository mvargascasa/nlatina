<div style="background-color: #f4f4f4" class="pt-5 pb-5 mt-5">
    <div class="text-center">
        <h4 style="font-family: Antic Didone">Contamos con un equipo de <b style="font-weight:normal ;color: rgb(137, 98, 63)"> Abogados y Notarios</b> en toda Latinoamérica</h4>
        <h6 style="font-family: sans-serif">SELECCIONE UN PAÍS</h6>
    </div>
    <div class="container mt-4">
        {!! Form::open(['id' => 'formSearchPartner']) !!}
        <div class="row countrysearch" style="margin-left: 13%">
            @php
                $countries = \App\Country::select('id', 'name_country', 'name_country_lower')->orderBy('name_country')->get();
            @endphp
            @foreach ($countries as $country)
                @if ($country->name_country != "Estados Unidos")
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