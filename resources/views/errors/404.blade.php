<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - No hemos encontrado esta página</title>

    <meta name="robots" content="noindex" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section class="flex items-center h-full p-16 bg-light-900 text-gray-500">
        <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
            <div class="max-w-md text-center">
                <h2 class="mb-8 font-extrabold text-9xl text-gray-600">
                    <span class="sr-only">Error</span>404
                </h2>
                <p class="text-2xl font-semibold md:text-3xl">Lo sentimos, no logramos encontrar esta página.</p>
                <p class="mt-4 mb-8 text-gray-400">Pero no se preocupe, puede encontrar muchas otras cosas en nuestra página de inicio.</p>
                <a rel="noopener noreferrer" href="{{route('web.index')}}" class="px-8 py-3 font-semibold rounded bg-sky-950 text-white">Ir a página de Inicio</a>
            </div>
        </div>
    </section>
    
</body>
</html>