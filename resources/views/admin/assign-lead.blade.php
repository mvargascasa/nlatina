@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    <div class="container col-md-10 mt-3">
        <div>
            <h1>Información de Lead</h1>
            <p> <b>Nombre:</b> {{$customer->nombre}}</p>
            <p><b>Email:</b> {{$customer->email}}</p>
            <p><b>País: </b> {{$customer->pais}}</p>
            <p><b>Estado:</b> {{$customer->estado}}</p>
            <p><b>Telefono: </b> {{$customer->telefono}}</p>
            <p><b>Mensaje: </b> {{$customer->mensaje}}</p>
            <p><b>Proveniente: </b> {{$customer->proviene}}</p>
        </div>
        <hr>
        <div>
            <h2>Asignar a Abogado:</h2>
            <form action="{{route('partner.assign.lead')}}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <select name="partner_id" class="form-select form-control w-50" required>
                    <option value="">Seleccione</option>
                    @foreach ($partners as $partner)
                        <option value="{{$partner->id}}">{{$partner->name . " " . $partner->lastname}} - {{count($partner->customers)}}</option>
                    @endforeach
                </select>
                <button class="btn btn-success mt-4" type="submit">Asignar Lead</button>
            </form>
        </div>
        <div class="mt-5">
            <h2>Buscar:</h2>
            
                <div class="form-group d-flex">
                    <select name="country" id="selcountry" class="form-control mr-1 selcountry" onchange="getstates(this)">
                        <option value="">Seleccione</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name_country}}</option>
                        @endforeach
                    </select>
                    <select name="state" id="selstate" class="form-control ml-1 selstate">
                        <option value="">Seleccione</option>
                    </select>
                </div>
            
        </div>
        @if (session('status'))
            <div class="mt-4">
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            </div>
        @endif
    </div>
@endsection

@section('end-scripts')
    <script>
    let selcountry = document.getElementById("selcountry");
    let selstate = document.getElementById("selstate");

    // selCountry.addEventListener("change", () => {
    //     alert('hello world');
    //     console.log('entra aqui');
    //     //getstates();
    // });
    
    const getstates = async (object) => {
        selstate.options.length = 0;
        let id = object.value;
        //let id = selCountry.options[selCountry.selectedIndex].dataset.id;
        const response = await fetch("{{url('getstates')}}/"+id );
        const states = await response.json();
        let newoption = document.createElement('option');
        //selstate.add(newoption, undefined);
        newoption.text = 'Nuevo...';
        newoption.value = "";
        //selstate.appendChild(newoption);
        selstate.add(newoption);
            states.forEach(state => {
                let opt = document.createElement('option');
                opt.appendChild( document.createTextNode(state.name_state) );
                opt.value = state.name_state;
                //console.log(opt);
                selstate.appendChild(opt);
        });
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
    </script>
@endsection