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
<script>
    (function () {
    var scrollFired = false;

    function saveScroll () {
        if (window.localStorage) {
            window.localStorage.setItem("scrollLeftTop", window.pageXOffset + "," + window.pageYOffset);
        }
    }

    function autoScroll() {
        scrollFired = true;
        if (window.localStorage) {
            var xy = window.localStorage.getItem("scrollLeftTop");
            if (xy) {
                var a = xy.split(",");
                var x = a[0];
                var y = a[1];
                window.scroll(x, y);
            }
        }
    }

    function onLoadAutoScroll() {
       if(scrollFired === false) {//Prevent scroll if run DOMContentLoaded
          autoScroll();
       }
    }

    window.addEventListener("DOMContentLoaded", autoScroll, false);
    window.addEventListener("load", onLoadAutoScroll, false);//If DOMContentLoaded not "run"
    window.addEventListener("scroll", saveScroll, false);
})();
</script>