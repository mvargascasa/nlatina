<div style="background-color: #f4f4f4" class="pt-5 pb-5 mt-5">
    <div class="text-center">
        <h5>Contamos con un equipo de Abogados y Notarios en toda Latinoamérica</h5>
        <h4 style="font-weight: bold">SELECCIONE UN PAÍS</h4>
    </div>
    <div class="container mt-4">
        {!! Form::open(['id' => 'formSearchPartner']) !!}
        <div class="row" style="margin-left: 13%">
            @php
                $countries = \App\Country::select('id', 'name_country', 'name_country_lower')->orderBy('name_country')->get();
            @endphp
            @foreach ($countries as $country)
                <div class="col-sm-4 mb-2">
                    <img src="{{ asset('img/partners/'.$country->name_country_lower.'.png') }}" alt="">
                    <input type="radio" name="country" id="country" value="{{ $country->id}}" required> {{ $country->name_country }}
                    {{-- <input class="countrySearch" type="submit" name="country" value="{{ $country->id }}"> --}}
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <button id="btnSubmitSearch" type="submit" class="btn" style="background-color: #00223b; color: #ffffff">Continuar</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>