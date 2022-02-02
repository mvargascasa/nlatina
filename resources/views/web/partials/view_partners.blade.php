<div>
    <h6 class="text-center mt-5">Solicite los servicios de un abogado <br> en Latinoamérica</h6>
</div>
<hr style="width: 50%">
<div class="text-center">
    <p><b>BUSCAR POR:</b></p>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        {!! Form::open(['route' => 'web.showallpartners', 'method' => 'POST', 'id' => 'formSearchPartnersAfter']) !!}
            <div class="row d-flex justify-content-center ml-5 mr-5">
            <div class="col-lg-3">    
                <div class="form-group">
                    <select class="form-control" name="country" id="country" onchange="loadStates();">
                        <option value="">País</option>
                        @foreach ($countries as $country)
                            @if ($country->name_country != "Estados Unidos")
                                <option value="{{ $country->id }}" @if(Request::get('country') == $country->id) selected @endif>{{ $country->name_country }}</option>
                            @endif
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
        {!! Form::close() !!}
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
        @if (count($partners) < $totalPartners)
            <div class="text-center mt-3">
                <button style="background-color: #002542; color:#ffffff" class="btn" onclick="cargarMas();">Cargar más</button>
            </div>
        @endif
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
                    alert('Error - ' + errorMessage);
                }
            });
    }

    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;
                h.innerHTML = this.innerHTML;
                y = this.parentNode.getElementsByClassName("same-as-selected");
                yl = y.length;
                for (k = 0; k < yl; k++) {
                y[k].removeAttribute("class");
                }
                this.setAttribute("class", "same-as-selected");
                break;
            }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
        arrNo.push(i)
        } else {
        y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
        }
    }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);

</script>