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
                            Projeto PR3
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="bg-gray-300 rounded-md my-4 p-8"> 
                        <div class="grid grid-cols-4 gap-4">

                            <?php 

                            $cursos = [
                                'curso de excel',
                                'python avancado',
                                'redes e internet'
                            ];

                            ?>

                            @foreach($cursos as $curso)

                            <div class="bg-white p-3 rounded-md text-center">
                                <img src="{{ URL::to('/') }}/image/exemplo.webp" />
                                <h3 class="mt-4 mb-4">{{ $curso }}</h3>
                                <a href="#" class="bg-gray-500 hover:bg-gray-700 hover:text-white p-2 rounded-none text-center">
                                    Cadastrar
                                </a>
                            </div> 

                            @endforeach


                          </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black ">
                        Projeto
                    </footer>
           
        </div>
    </body>
</html>
