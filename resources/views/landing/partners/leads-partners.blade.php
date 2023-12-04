<!DOCTYPE html>
<html lang="en">
<head>

    <title>Abogados en {{$data['country']}} - Notaria Latina</title>
    <meta name="title" content="Abogados en {{$data['country']}} - Notaria Latina">
    <meta name="description" content="¿Necesita la ayuda de un abogado en {{$data['country']}}? Contamos con un amplio directorio de profesionales que lo ayudarán. Contáctelos aquí ✔">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://notarialatina.com/landing/abogados-en-{{$data['country']}}">
    <meta property="og:title" content="Abogados en {{$data['country']}} - Notaria Latina">
    <meta property="og:description" content="¿Necesita la ayuda de un abogado en {{$data['country']}}? Contamos con un amplio directorio de profesionales que lo ayudarán. Contáctelos aquí ✔">
    <meta property="og:image" content="{{asset('img/abogados-landing.webp')}}">

    <meta name="robots" content="noindex" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abogados en {{$data['country']}} - Notaria Latina</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    {{-- font family montserrat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&family=Urbanist:wght@100;200;300;400;500&display=swap" rel="stylesheet">

    <style>
        html, body {max-width: 100% !important;overflow-x: clip; font-family: 'Montserrat'}
        @media screen and (max-width: 580px){.logo{width: 200px !important; height: 50px !important}}
    </style>

    <script id="recaptcha"></script>

    <script>
        setTimeout(() => {
            document.getElementById('recaptcha').src = "https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8";    
            document.addEventListener('submit', (event) => {
                event.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8', {action: 'submit'}).then(function(token) { 
                        let form = event.target;
                        let input = document.createElement('input');
                        input.type = "hidden"; input.name = "g-recaptcha-response"; input.value = token;
                        form.appendChild(input);
                        form.submit();
                    });
                });
            });
        }, 3000);
        //subir los cambios
    </script>

</head>
<body>

    <section id="prisection" style="min-height: 600px;background-size: cover;background-position: right top; background-repeat: no-repeat;">
        <div style="min-height: 600px; background-color: #0000007c">
            <div class="text-center md:text-left pt-5 px-5 md:pt-5">
                <div class="flex justify-between md:ml-40 md:mr-40">
                    <img class="logo" width="250px" height="200px" src="{{asset('img/logo-notaria-latina.webp')}}" alt="">
                    <a class="h-[40px] bg-yellow-500 px-8 rounded-full flex items-center text-white" target="_blank" href="https://api.whatsapp.com/send?phone=13474283543">Whatsapp</a>
                </div>
                <div class="text-center pt-12 md:pt-16">
                    <p class="text-white text-3xl md:text-6xl mt-10">¿NECESITA</p>
                    <p class="text-3xl md:text-6xl text-yellow-500 mt-4">ASESORÍA JURÍDICA?</p>
                    <p class="text-white text-xl mt-10"><i>¡Encuentre al mejor abogado para su caso!</i></p>            
                </div>
                {{-- <div>
                    <div class="flex justify-center md:justify-start">
                        <a href="tel:+13474283543" class="bg-amber-400 font-medium px-4 py-2 mt-4 flex shadow-lg"> <img width="25px" src="{{ asset('img/ring-phone.png') }}" alt=""> Contáctenos </a>
                    </div>
                    <div class="mt-3 flex justify-center md:justify-start">
                        <a href="https://api.whatsapp.com/send?phone=13474283543" class="bg-green-500 px-6 py-2 text-white flex"><img width="25px" class="mr-1" src="{{ asset('img/whatsapp.png') }}" alt=""> WhatsApp</a>
                    </div>
                </div> --}}
                {{-- <p class="mt-4"><a target="_blank" href="https://api.whatsapp.com/send?phone=13474283543" class="bg-amber-400 font-bold rounded px-4 py-2 mt-4"> Contáctanos </a></p> --}}
            </div>
        </div>
    </section>

    <section class="container mx-auto md:px-15 lg:px-28 xl:px-56 py-10 md:py-24">
        <section class="grid grid-rows-1 lg:grid-cols-2">
            <div class="flex items-center px-10">
                <div>
                    <h2 class="text-3xl text-[#083344] font-bold">¿CÓMO FUNCIONA?</h2>
                    <div class="flex gap-x-4 mt-10 pb-5">
                        <div class="rounded-full bg-yellow-500 text-[#083344] w-[70px] md:w-[45px] h-[30px] flex items-center justify-center font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-[#083344] text-2xl">PASO</h3>
                            <p class="text-md text-[#083344]">Ingrese su información personal (Nombres, país de residencia, teléfonos, email).</p>
                        </div>
                    </div>
                    <div class="flex gap-x-4 mt-5 pb-5">
                        <div class="rounded-full bg-yellow-500 text-[#083344] w-[55px] md:w-[35px] h-[30px] flex items-center justify-center font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-[#083344] text-2xl">PASO</h3>
                            <p class="text-md text-[#083344]">Ingrese la información del país en donde necesita el abogado</p>
                        </div>
                    </div>
                    <div class="flex gap-x-4 mt-5">
                        <div class="rounded-full bg-yellow-500 text-[#083344] w-[50px] md:w-[30px] h-[30px] flex items-center justify-center font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-[#083344] text-2xl">PASO</h3>
                            <p class="text-md text-[#083344]">Describa su problema legal de manera concisa y clara</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div class="bg-gray-100 pb-10 mx-0 md:mx-5 px-5 md:px-8 mt-5 md:mt-0">
                        <p class="text-center text-[#083344] font-bold text-lg pt-5"><i>REALIZAR CONSULTA</i></p>
                        <p class="text-sm px-3 mt-2 mb-2 text-[#083344] font-semibold">Complete el formulario para que un abogado pueda conocer su caso</p>
                        <form action="{{route('set.lead.partner')}}" method="POST" class="px-3 md:px-0">
                            @csrf
                            <input type="hidden" name="from" value="{{$data['country']}}">
                            <div class="flex gap-x-2 py-1">
                                <div class="w-full">
                                    <input type="text" class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="name" placeholder="Nombre" required>
                                </div>
                                <div class="w-full">
                                    <input type="text" class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="lastname" placeholder="Apellido" required>
                                </div>
                            </div>
                            
                            <div class="flex flex-cols-2 md:flex-row justify-between w-full gap-x-2 py-1">
                                <div class="w-full">
                                    <select class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none text-gray-400" name="country" id="selcountry" required>
                                        <option value="">País de residencia</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->name_country}}" data-id="{{$country->id}}">{{$country->name_country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <select class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none text-gray-400" name="state" id="selstate" required>
                                        <option value="">Estado/Departamento</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="flex justify-between gap-x-2 py-1">
                                <div class="flex w-full mt-0">
                                    <input id="code" name="code" type="text" class="w-1/4 h-8 rounded-l-lg border-slate-200 outline-none text-center text-sm text-gray-500" readonly>
                                    <input type="number" class="pl-3 text-sm w-3/4 h-8 rounded-r-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="phone" placeholder="Teléfono" required>
                                </div>
                                <div class="w-full">
                                    <input type="text" class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="email" placeholder="Correo electrónico" required>
                                </div>
                            </div>

                            <p class="font-semibold text-sm text-[#083344] py-2">Información en donde necesita el abogado:</p>
                            <div class="flex flex-cols-2 md:flex-row justify-between w-full gap-x-4 py-2">
                                <div class="w-full">
                                    <select class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none text-gray-400" name="countrya" id="selcountrya" required>
                                        <option value="">País</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->name_country}}" data-id="{{$country->id}}">{{$country->name_country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <select class="pl-3 text-sm w-full h-8 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none text-gray-400" name="statea" id="selstatea" required>
                                        <option value="">Estado/Departamento</option>
                                    </select>
                                </div>
                            </div>
    
    
                            <div class="flex mt-1">
                                <textarea rows="4" class="pl-3 pt-3 text-sm w-full rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="comment" placeholder="Describa su problema legal..." required></textarea>
                            </div>

                            <div class="mt-2">
                                <p class="text-xs text-center">*Su información es confidencial y se utiliza exclusivamente con el propósito previamente indicado</p>
                            </div>

                            <div class="grid mt-2 mx-4 mt-4">
                                <button class="w-full bg-amber-400 font-bold rounded-lg h-8">ENVIAR FORMULARIO</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="bg-gray-100 py-14">
        <section class="container mx-auto px-5 md:px-52">
            <section class="grid grid-rows-1 lg:grid-cols-4 gap-x-20 text-[#083344]">
                <div class="text-center">
                    <i class="fa-solid fa-users fa-2x"></i>
                    <p class="mt-2 font-bold">+1000 abogados</p>
                    <div class="h-[2px] bg-yellow-500 mt-2"></div>
                    <p class="mt-2 text-sm">Día a día <b>decenas de abogados</b> se registran en nuestra plataforma</p>
                </div>
                <div class="text-center">
                    <i class="fa-solid fa-map-location-dot fa-2x"></i>
                    <p class="mt-2 font-bold">18 países</p>
                    <div class="h-[2px] bg-yellow-500 mt-2"></div>
                    <p class="mt-2 text-sm">Contamos con abogados en toda <b>LATINOAMÉRICA</b></p>
                </div>
                <div class="text-center">
                    <i class="fas fa-chart-line fa-2x"></i>
                    <p class=" mt-2 font-bold">+1 año</p>
                    <div class="h-[2px] bg-yellow-500 mt-2"></div>
                    <p class=" mt-2 text-sm">Llevamos más de un año <b>innovando y mejorando</b> nuestra plataforma</p>
                </div>
                <div class="text-center">
                    <i class="fa-solid fa-desktop fa-2x"></i>
                    <p class="mt-2 font-bold">online</p>
                    <div class="h-[2px] bg-yellow-500 mt-2"></div>
                    <p class="mt-2 text-sm">Puede encontrar abogados en línea, <b>cotizar gratis y sin compromiso</b></p>
                </div>
            </section>
        </section>
    </section>

    {{-- <div class="h-2.5 bg-amber-500"></div>

    <div class="bg-cyan-950 text-white sm:inline-block md:flex items-center justify-items-center text-justify">   
        <div class="px-10 py-10 md:px-28">
            <p>
                En {{$data['country']}} el sistema legal puede ser complicado y confuso. Si se encuentra enfrentando un
                problema o asunto legal viviendo en los Estados Unidos y necesita un abogado que se encuentre
                en {{$data['country']}}, es importante contar con un abogado confiable y experimentado que pueda representarle
                y proteger sus derechos. En nuestra plataforma, podrá encontrar al mejor abogado para su caso.
            </p>
        </div>
        <div>
            <img class="lazy" width="1300px" height="800px" data-src="@if(isset($data['image'])){{asset('img/'.$data['image'])}} @else {{asset('img/ciudadanos-mexico.jpg')}} @endif" alt="abogados en {{$data['country']}}">
        </div>
    </div>

    <div class="sm:inline-block md:flex md:px-24 mt-12">
        <div class="grid grid-rows-3 md:w-3/6 inline-block justify-center">
            <div class="bg-slate-50 rounded-md py-5 text-center px-5 mx-16 mb-4 shadow-lg flex items-center">
                <div>
                    <div class="w-100 flex justify-center">
                        <img class="lazy" data-src="{{asset('img/especialista.png')}}" alt="">
                    </div>
                    <p class="text-amber-400 text-xl mt-3 font-extrabold md:px-24">Especialistas en todas las áreas del derecho</p>
                    <p class="mt-3 text-xs">
                        Nuestra plataforma le conecta con abogados especializados en diferentes áreas del derecho. Ya sea que necesite un abogado
                        de familia, un abogado penalista, un abogado fiscal o cualquier otro tipo de abogado, aquí encontrará el experto que necesita
                    </p>
                </div>
            </div>
            <div class="bg-slate-50 rounded-md py-5 text-center px-5 mx-16 mb-4 shadow-lg flex items-center">
                <div>
                    <div class="w-100 flex justify-center">
                        <img class="lazy" data-src="{{asset('img/experiencia.png')}}" alt="">
                    </div>
                    <p class="text-amber-400 text-xl mt-3 font-extrabold md:px-24">Experiencia y Confianza</p>
                    <p class="mt-3 text-sm">
                        
                    </p>
                </div>
            </div>
            <div class="bg-slate-50 rounded-md py-5 text-center px-5 mx-16 mb-4 shadow-lg flex items-center">
                <div>
                    <div class="w-100 flex justify-center">
                        <img class="lazy" data-src="{{asset('img/eleccion.png')}}" alt="">
                    </div>
                    <p class="text-amber-400 text-xl mt-3 font-extrabold md:px-24">Facilidad y Variedad</p>
                    <p class="mt-3 text-sm">
                        Se contactaran con usted una lista de abogados a través de su WhatsApp o correo electrónico, para que pueda elegir el que más
                        se adapte a sus necesidades.
                    </p>
                </div>
            </div>
        </div>
        <div class="md:mr-20 mt-10 md:mt-0">
            <div class="text-center px-3 md:px-0">
                <p class="text-3xl">¡COMPLETE EL <b>FORMULARIO</b>!</p>
                <p class="mt-4 text-sm"><i>Complete el formulario para que nuestros abogados puedan ponerse en contacto con usted y brindarle la ayuda que necesita</i></p>
            </div>
            <div class="mt-10 md:mt-5">
                <div class="bg-sky-950 pb-10 md:mx-5 md:px-8">
                    <p class="text-center text-white font-bold text-lg pt-5">¿Cuál es <b class="text-amber-400 font-bold">su problema legal</b>?</p>
                    <form action="{{route('set.lead.partner')}}" method="POST" class="px-3 md:px-0">
                        @csrf
                        <input type="hidden" name="from" value="{{$data['country']}}">
                        <div class="flex gap-x-4 py-2">
                            <div class="w-full">
                                <input type="text" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="name" placeholder="Nombre" required>
                            </div>
                            <div class="w-full">
                                <input type="text" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="lastname" placeholder="Apellido" required>
                            </div>
                        </div>
                        
                        <div class="flex flex-col md:flex-row justify-between w-full gap-x-4 py-2">
                            <div class="w-full">
                                <select class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="country" id="selcountry" required>
                                    <option value="">País de residencia</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->name_country}}" data-id="{{$country->id}}">{{$country->name_country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex w-full mt-4 md:mt-0">
                                <input id="code" name="code" type="text" class="w-1/4 rounded-l-lg outline-none text-center text-sm text-gray-500" readonly>
                                <input type="number" class="pl-3 text-sm w-3/4 h-10 rounded-r-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="phone" placeholder="Teléfono" required>
                            </div>
                        </div>
                        
                        <div class="flex justify-between gap-x-4 py-2">
                            <div class="w-full">
                                <select class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="state" id="selstate" required>
                                    <option value="">Estado/Departamento</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <input type="text" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="email" placeholder="Correo electrónico" required>
                            </div>
                        </div>


                        <div class="flex mt-2">
                            <textarea rows="6" class="pl-3 pt-3 text-sm w-full rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 outline-none" name="comment" placeholder="Describa su problema legal..." required></textarea>
                        </div>
                        <div class="grid mt-2 mx-4 mt-4">
                            <button class="w-full bg-amber-400 font-bold rounded-lg h-10">ENVIAR FORMULARIO</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <footer class="mt-10">
        <div class="bg-sky-950 text-white text-center py-3">
            © Copyright 2023 - Notaria Latina
        </div>
    </footer>

    <div class="fixed bottom-5 right-5 z-10">
        <div>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=13474283543">
                <img class="w-[60px]" src="{{ asset('img/whatsapp.png') }}" alt="whatsapp_image">
            </a>
        </div>
    </div>  
    
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<script>
    window.addEventListener('load',  () => {
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/consultar abogados.avif')}}')";
    });

    let selCountry = document.getElementById('selcountry');
    let selState = document.getElementById('selstate');

    let selCountrya = document.getElementById('selcountrya')
    let selStatea = document.getElementById('selstatea');

    selCountry.addEventListener("change", async () => {
        selState.options.length = 0;
        let id = selCountry.options[selCountry.selectedIndex].dataset.id;
        setCode(id);
        const response = await fetch("{{url('getstates')}}/"+id);
        const states = await response.json();

        let opt = document.createElement('option');
            opt.appendChild(document.createTextNode('Estado/Departamento'));
            opt.value = '';
            selState.appendChild(opt);
        states.forEach(state => {
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(state.name_state));
            opt.value = state.name_state;
            opt.setAttribute('data-id', state.id);
            selState.appendChild(opt);
        });
        //para poner el select de city sin options -> cada vez que cambie el select de country
        // selCity.options.length = 0;
        // var optaux = document.createElement('option'); optaux.appendChild(document.createTextNode('Ciudad')); optaux.value = '';
        // selCity.appendChild(optaux);
    });

    selCountrya.addEventListener("change", async () => {
        selStatea.options.length = 0;
        let id = selCountrya.options[selCountrya.selectedIndex].dataset.id;
        setCode(id);
        const response = await fetch("{{url('getstates')}}/"+id);
        const states = await response.json();

        let opt = document.createElement('option');
            opt.appendChild(document.createTextNode('Estado/Departamento'));
            opt.value = '';
            selStatea.appendChild(opt);
        states.forEach(state => {
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(state.name_state));
            opt.value = state.name_state;
            opt.setAttribute('data-id', state.id);
            selStatea.appendChild(opt);
        });
        //para poner el select de city sin options -> cada vez que cambie el select de country
        // selCity.options.length = 0;
        // var optaux = document.createElement('option'); optaux.appendChild(document.createTextNode('Ciudad')); optaux.value = '';
        // selCity.appendChild(optaux);
    });

    const setCode = (CountryID) => {
        let inpCode = document.getElementById('code');
        switch (CountryID) {
            case "1": inpCode.value = "+54"; break;
            case "2": inpCode.value = "+591"; break;
            case "3": inpCode.value = "+57"; break;
            case "4": inpCode.value = "+506"; break;
            case "5": inpCode.value = "+593"; break;
            case "6": inpCode.value = "+503"; break;
            case "7": inpCode.value = "+34"; break;
            case "8": inpCode.value = "+1"; break;
            case "9": inpCode.value = "+502"; break;
            case "10": inpCode.value = "+504"; break;
            case "11": inpCode.value = "+52"; break;
            case "12": inpCode.value = "+505"; break;
            case "13": inpCode.value = "+507"; break;
            case "14": inpCode.value = "+595"; break;
            case "15": inpCode.value = "+51"; break;
            case "16": inpCode.value = "+1"; break;
            case "17": inpCode.value = "+809"; break;
            case "18": inpCode.value = "+598"; break;
            case "19": inpCode.value = "+58"; break;
            case "20": inpCode.value = "+56"; break;
            default: break;
        }
    }

    document.addEventListener("DOMContentLoaded",function(){let e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
</script>
</body>
</html>
