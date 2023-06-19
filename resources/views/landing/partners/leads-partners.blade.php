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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <style>
        html, body {max-width: 100% !important;overflow-x: clip}
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

    <section class="w-full h-[60px] bg-gray-800 fixed top-0 left-0 right-0 flex justify-between items-center px-4">
        <div>
            <img class="w-[45px]" src="{{ asset('img/iso2.png') }}" alt="">
        </div>
        <div>
            <a class="text-amber-400 font-medium shadow-lg border-b border-amber-400" href="tel:+13474283543">347-428-3543</a>
        </div>
    </section>

    <section id="prisection" style="min-height: 700px;background-size: cover;background-position: right top; background-repeat: no-repeat;">
        <div class="md:ml-28 text-center md:text-left pt-32 md:pt-20">
            <div class="flex justify-center md:inline-block md:justify-start">
                <img width="350px" height="300px" src="{{asset('img/logo-notaria-latina.webp')}}" alt="">
            </div>
            <p class="text-white text-3xl md:text-6xl leading-tight mt-10">¿NECESITA UN ABOGADO <br> <b class="text-4xl @if($data['country'] == "República Dominicana") md:text-7xl @else md:text-8xl @endif">EN {{mb_strtoupper($data['country'])}}?</b></p>
            <p class="text-amber-400 text-xl mt-10"><i>¡Encuentre al <b>mejor abogado</b> para su caso!</i></p>            
            <div>
                <div class="flex justify-center md:justify-start">
                    <a href="tel:+13474283543" class="bg-amber-400 font-medium px-4 py-2 mt-4 flex shadow-lg"> <img width="25px" src="{{ asset('img/ring-phone.png') }}" alt=""> Contáctenos </a>
                </div>
                <div class="mt-3 flex justify-center md:justify-start">
                    <a href="https://api.whatsapp.com/send?phone=13474283543" class="bg-green-500 px-6 py-2 text-white flex"><img width="25px" class="mr-1" src="{{ asset('img/whatsapp.png') }}" alt=""> WhatsApp</a>
                </div>
            </div>
            {{-- <p class="mt-4"><a target="_blank" href="https://api.whatsapp.com/send?phone=13474283543" class="bg-amber-400 font-bold rounded px-4 py-2 mt-4"> Contáctanos </a></p> --}}
        </div>
    </section>
    <div class="h-2.5 bg-amber-500"></div>

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
                        Todos los abogados en nuestra plataforma cuentan con la experiencia necesaria para brindarle un servicio legal de calidad. Además,
                        han sido seleccionados cuidadosamente para asegurarnos de que sean abogados confiables y éticos.
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
    </div>

    <footer class="mt-5">
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

<script>
    window.addEventListener('load',  () => {
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/abogados-landing-1.webp')}}')";
    });

    let selCountry = document.getElementById('selcountry');
    let selState = document.getElementById('selstate');

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
