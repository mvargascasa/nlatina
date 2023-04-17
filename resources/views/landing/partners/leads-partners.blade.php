<!DOCTYPE html>
<html lang="en">
<head>

    <title>Abogados en {{$data['country']}} - Notaria Latina</title>
    <meta name="title" content="Abogados en {{$data['country']}} - Notaria Latina">
    <meta name="description" content="¿Necesita la ayuda de un abogado en {{$data['country']}}? Contamos con un amplio directorio de profesionales que lo ayudarán. Contáctelos aquí ✔">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://notarialatina.com/landing/abogados-en-mexico">
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

    <style>
        html, body {max-width: 100% !important;overflow-x: clip}
    </style>
</head>
<body>

    <section id="prisection" style="min-height: 700px;background-size: cover;background-position: right top; background-repeat: no-repeat;">
        <div class="md:ml-28 text-center md:text-left pt-32 md:pt-20">
            <div class="flex justify-center md:inline-block md:justify-start">
                <img width="350px" src="{{asset('img/logo-notaria-latina.webp')}}" alt="">
            </div>
            <p class="text-white text-3xl md:text-6xl leading-tight mt-10">¿NECESITA UN ABOGADO <br> <b class="text-4xl @if($data['country'] == "República Dominicana") md:text-7xl @else md:text-8xl @endif">EN {{mb_strtoupper($data['country'])}}?</b></p>
            <p class="text-amber-400 text-xl mt-10"><i>¡Encuentre al <b>mejor abogado</b> para su caso!</i></p>
        </div>
    </section>
    <div class="h-2.5 bg-amber-500"></div>

    <div class="bg-cyan-950 text-white sm:inline-block md:flex items-center justify-items-center text-justify mt-5">   
        <div class="px-10 py-10 md:px-28">
            <p>
                En {{$data['country']}} el sistema legal puede ser complicado y confuso. Si se encuentra enfrentando un
                problema o asunto legal viviendo en los Estados Unidos y necesita un abogado que se encuentre
                en {{$data['country']}}, es importante contar con un abogado confiable y experimentado que pueda representarle
                y proteger sus derechos. En nuestra plataforma, podrá encontrar al mejor abogado para su caso.
            </p>
        </div>
        <div>
            <img class="lazy" width="1500px" data-src="@if(isset($data['image'])){{asset('img/'.$data['image'])}} @else {{asset('img/ciudadanos-mexico.jpg')}} @endif" alt="abogados en {{$data['country']}}">
        </div>
    </div>

    <div class="sm:inline-block md:flex md:px-24 mt-12">
        <div class="grid grid-rows-3 md:w-3/6 inline-block justify-center">
            <div class="bg-slate-50 rounded-md py-5 text-center px-5 mx-16 mb-4 shadow-lg flex items-center">
                <div>
                    <i class="fa-solid fa-user-gear fa-2xl mt-5"></i>
                    <p class="text-amber-400 text-xl mt-3 font-extrabold md:px-24">Especialistas en todas las áreas del derecho</p>
                    <p class="mt-3 text-xs">
                        Nuestra plataforma le conecta con abogados especializados en diferentes áreas del derecho. Ya sea que necesite un abogado
                        de familia, un abogado penalista, un abogado fiscal o cualquier otro tipo de abogado, aquí encontrará el experto que necesita
                    </p>
                </div>
            </div>
            <div class="bg-slate-50 rounded-md py-5 text-center px-5 mx-16 mb-4 shadow-lg flex items-center">
                <div>
                    <i class="fa-solid fa-ranking-star fa-2xl mt-5"></i>
                    <p class="text-amber-400 text-xl mt-3 font-extrabold md:px-24">Experiencia y Confianza</p>
                    <p class="mt-3 text-sm">
                        Todos los abogados en nuestra plataforma cuentan con la experiencia necesaria para brindarle un servicio legal de calidad. Además,
                        han sido seleccionados cuidadosamente para asegurarnos de que sean abogados confiables y éticos.
                    </p>
                </div>
            </div>
            <div class="bg-slate-50 rounded-md py-5 text-center px-5 mx-16 mb-4 shadow-lg flex items-center">
                <div>
                    <i class="fa-solid fa-users fa-2xl mt-5"></i>
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
                    <form action="">

                        <div class="grid md:grid-cols-2 grid-cols-1">
                            <div class="ml-4 mr-4 md:mr-2 mb-2 mt-4">
                                <input type="text" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Nombre">
                            </div>
                            <div class="md:ml-2 ml-4 mr-4 mb-2 mt-2 md:mt-4">
                                <input type="text" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Apellido">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 grid-cols-1">
                            <div class="ml-4 mr-4 md:mr-2 mt-2 mb-4">
                                <input type="number" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Teléfono">
                            </div>
                            <div class="md:ml-2 ml-4 mr-4 md:mt-2 mb-4">
                                <input type="text" class="pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Correo electrónico">
                            </div>
                        </div>

                        <div class="grid md: grid-cols-2 grid-cols-1">
                            <div class="ml-4 mr-4 md:mr-2 mt-2 mb-4">
                                <select class="text-gray-400 pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" id="selcountry">
                                    <option value="">País de residencia</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->name_country}}" data-id="{{$country->id}}">{{$country->name_country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:ml-2 ml-4 mr-4 md:mt-2 mb-4">
                                <select class="text-gray-400 pl-3 text-sm w-full h-10 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" id="selstate">
                                    <option value="">Estado/Departamento</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid mx-4 mt-4">
                            <textarea name="" id="" rows="6" class="pl-3 pt-3 text-sm w-full rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Describa su problema legal..."></textarea>
                        </div>
                        <div class="grid mt-2 mx-4 mt-4">
                            <button class="w-full bg-amber-400 font-bold rounded-lg h-10">ENVIAR FORMULARIO</button>
                        </div>
                    </form>
                </div>
            </div>
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

    document.addEventListener("DOMContentLoaded",function(){let e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    
</script>
</body>
</html>