<div style="background-color: #f4f4f4" class="pt-5 pb-5 mt-5">
    <div class="text-center">
        <h5>Contamos con un equipo de Abogados y Notarios en toda Latinoamérica</h5>
        <h4 style="font-weight: bold">SELECCIONE UN PAÍS</h4>
    </div>
    <div class="container mt-4">
        {!! Form::open(['id' => 'formSearchPartner']) !!}
        <div class="row countrysearch" style="margin-left: 13%">
            @php
                $countries = \App\Country::select('id', 'name_country', 'name_country_lower')->orderBy('name_country')->get();
            @endphp
            @foreach ($countries as $country)
                <div onclick="selectCountry({{ $country->id }})" style="cursor: pointer" class="col-sm-4 col-6 mb-2">
                    <img src="{{ asset('img/partners/'.$country->name_country_lower.'.png') }}" alt=""> {{ $country->name_country}}
                </div>
            @endforeach
        </div>
        <input type="hidden" name="country" id="country">
        {!! Form::close() !!}
    </div>
</div>