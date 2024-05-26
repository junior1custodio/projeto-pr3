<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal PR3</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-sans antialiased">

    <div class="w-10/12 p-6 mx-auto ">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                Cadastro
            </div>
        </header>

        <main class="bg-gray-300 rounded-md my-4 p-8">

            <form class="flex flex-col bg-white rounded-md p-12" action="{{ route('course.store') }}" method="post">
             @csrf
                <input name="name" type="text" placeholder="Nome do Curso" class="border border-gray-300 p-2 rounded-md mb-6">
                <textarea name="description" placeholder="Descrição do Curso" class="border border-gray-300 p-2 rounded-md mb-6"></textarea>
                <input name="video" type="text" placeholder="Video" class="border border-gray-300 p-2 rounded-md mb-6">

                <button type="submit" class="bg-blue-500 p-2 hover:bg-gray-500"> CADASTRAR </button>

            </form>



        </main>

        <footer class="py-16 text-center text-sm text-black ">
            Projeto
        </footer>

    </div>
</body>

</html>
