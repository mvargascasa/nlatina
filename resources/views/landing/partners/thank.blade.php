<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gracias por enviar su información - Notaria Latina </title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-cyan-950 text-white">
    <div class="flex items-center justify-center h-screen">
      <div>
        <div class="mb-5 flex items-center justify-center">
          <img width="300px" height="100px" src="{{asset('img/logo-notaria-latina.webp')}}" alt="">
        </div>
        <div class="flex flex-col items-center space-y-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 w-28 h-28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <h1 class="text-4xl font-bold">Gracias!</h1>
          <p class="px-2 text-center py-5">Gracias por enviar su información y confiar en nosotros. En breve se contactarán con usted</p>
          <a href="{{route('web.index')}}"
            class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 border border-indigo-600 rounded rounded-full hover:bg-indigo-700 focus:outline-none focus:ring">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-2" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
            </svg>
            <span class="text-sm font-medium">
              Inicio
            </span>
          </a>
        </div>
      </div>
    </div>
  </body>

</html>