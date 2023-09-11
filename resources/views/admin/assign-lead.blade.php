@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    <div class="mt-3">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="border p-4 shadow-sm">
                    <h1>Información de Lead</h1>
                    <div class="row">
                        <div class="col-sm-4"><p> <b><i class="fa-solid fa-user"></i> Nombre:</b> {{$customer->nombre}}</p></div>
                        <div class="col-sm-4"><p><b><i class="fa-solid fa-envelope"></i> Email:</b> {{$customer->email}}</p></div>
                        <div class="col-sm-4"><p><b><i class="fa-solid fa-earth-americas"></i> País: </b> {{$customer->pais}}</p></div>
                        <div class="col-sm-4"><p><b><i class="fa-solid fa-location-dot"></i> Estado:</b> {{$customer->estado}}</p></div>
                        <div class="col-sm-4"><p><b><i class="fa-solid fa-phone"></i> Telefono: </b> {{$customer->telefono}}</p></div>
                        <div class="col-sm-4"><p><b><i class="fa-solid fa-pager"></i> Proveniente: </b> {{$customer->proviene}}</p></div>
                        <div class="col-sm-4"><p><b><i class="fa-solid fa-message"></i> Mensaje: </b> {{$customer->mensaje}}</p></div>
                    </div>
                </div>
                <hr>
                <div class="border p-4 shadow-sm">
                    <h2>Asignar a Abogado:</h2>
                    <p><i class="fa-solid fa-circle-info"></i> Seleccione un abogado de la lista para asignar el lead</p>
                    <form action="{{route('partner.assign.lead')}}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <select name="partner_id" id="selpartner" class="form-select form-control w-50" required>
                            <option value="">Seleccione</option>
                            @foreach ($partners as $partner)
                                <option value="{{$partner->id}}">{{$partner->name . " " . $partner->lastname}} - {{count($partner->customers)}}</option>
                            @endforeach
                        </select>
                        @if(count($customer->partners)>0)
                            <input type="hidden" name="last_partner" value="{{ $customer->partners[0]->id}}">
                        @endif
                        <button class="btn btn-success rounded-0 mt-4" type="submit">@if(count($customer->partners) > 0) Re-asignar Lead @else AsignarLead @endif</button>
                    </form>
                </div>
                <hr>
                <div class="border p-4 shadow-sm">
                    <h2>Buscar:</h2>
                        <p><i class="fa-solid fa-circle-info"></i> Seleccione el país, estado y especialidad que busca el lead para encontrar varios abogados</p>
                        <div class="form-group d-flex">
                            <div class="w-100">
                                <label for="country">Estado</label>
                                <select name="country" id="selcountry" class="form-control mr-1 selcountry" onchange="getstates(this)">
                                    <option value="">Seleccione</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name_country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-100">
                                <label for="state">Ciudad</label>
                                <select name="state" id="selstate" class="form-control ml-1 selstate">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                            <div class="w-100">
                                <label for="">Especialidad</label>
                                <select name="" id="selspecialty" class="form-control ml-2">
                                    <option value="">Seleccione</option>
                                    @foreach ($specialties as $specialty)
                                    <option value="{{$specialty->name_specialty}}">{{$specialty->name_specialty}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-info rounded-0" onclick="searchtoassign()">Buscar</button>
                    
                </div>
                @if (session('status'))
                    <div class="mt-4">
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    </div>
                @endif
            </div>
            @if(count($customer->partners) > 0)
                <div class="col-md-2 border-left">
                    @foreach ($customer->partners as $custom_part)
                        <div class="alert alert-success">
                            <h5 class="font-weight-bold">Lead Asignado</h5>
                            <p>Este lead fue asignado al abogado:</p>
                            <span style="cursor: pointer" onmouseover="showpopup()">{{ $custom_part->name . " " . $partner->lastname }}</span>
                        </div>
                        <div id="alert-pop-up" class="d-none">
                            <div class="shadow-sm border rounded">
                                <div class="position-relative">
                                    <span class="position-absolute font-weight-bold" style="top: 5px; right: 10px; cursor: pointer" onclick="document.getElementById('alert-pop-up').classList.add('d-none')">x</span>
                                </div>
                                <div class="text-center pb-3">
                                    <div class="d-flex justify-content-center align-items-center py-4">
                                        <img width="125px" height="125px" class="rounded-circle" src="@if($custom_part->img_profile != null) {{ asset('storage/'.$custom_part->img_profile) }} @else {{ asset('img/user1.png') }} @endif" alt="">
                                    </div>
                                    <a class="text-muted" href="{{ route('partner.show', $custom_part) }}">Ver perfil</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@section('end-scripts')
    <script>
    const selcountry = document.getElementById("selcountry");
    const selstate = document.querySelector("#selstate");
    
    const getstates = async (object) => {
        this.selstate.options.length = 0;
        let id = object.value;
        //let id = selCountry.options[selCountry.selectedIndex].dataset.id;
        const response = await fetch("{{url('getstates')}}/"+id );
        const states = await response.json();
        let newoption = document.createElement('option');
        //selstate.add(newoption, undefined);
        newoption.text = 'Seleccione';
        newoption.value = "";
        //selstate.appendChild(newoption);
        this.selstate.add(newoption);
            states.forEach(state => {
                let opt = document.createElement('option');
                opt.appendChild( document.createTextNode(state.name_state) );
                opt.value = state.name_state;
                //console.log(opt);
                this.selstate.appendChild(opt);
        });
    }

    const searchtoassign = async () => {
        let data = {
            'country' : document.getElementById('selcountry').value,
            'state' : document.getElementById('selstate').value,
            'specialty' : document.getElementById('selspecialty').value
        };

        const response = await fetch("{{route('partner.search.assign')}}", {
            headers: new Headers({
                'Content-Type': 'application/json; charset=UTF-8',
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }),
            method: "POST",
            body: JSON.stringify(data),
        });

        const selpartners = document.getElementById("selpartner");
        //console.log(response.json());
        const partners = await response.json();
        selpartners.options.length = 0;
        let opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Seleccione'));
        opt.value = "";
        selpartners.appendChild(opt);
        partners.forEach(partner => {
            let opt = document.createElement('option');
            opt.appendChild(document.createTextNode(partner.name + " " + partner.lastname + " - " + partner.customers.length));
            opt.value = partner.id;
            selpartners.appendChild(opt);
            //this.selpartners.appendChild(opt);
        });
        partners.length <= 0 ? alert('No se encontraron abogados con estos parámetros') : alert('Se cargo una nueva lista de abogados');
        
    }

        // async function search_partner(){
        //     let input_email = document.getElementById('email');
        //     let input_country_residence = document.getElementById('country_residence');
        //     let input_phone = document.getElementById('phone');

        //     const response = await fetch("{{url('/partners/getcustomer')}}"+"/"+id);
        //     const data = await response.json();
        //     if(data != false){
        //         input_email.value = data.email;
        //         input_country_residence.value = data.pais;
        //         input_phone.value = data.telefono;
        //     } else if(data == false){
        //         alert('Algo salio mal, no logramos cargar los datos del cliente. Por favor intente ingresando manualmente');
        //     }
        // }

        const showpopup = () => document.getElementById('alert-pop-up').classList.remove('d-none');
        const dismisspopup = () => document.getElementById('alert-pop-up').classList.add('d-none');
    </script>
@endsection