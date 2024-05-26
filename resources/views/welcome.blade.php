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
            <div class="flex lg:justify-center lg:col-start-2 text-3xl font-bold">
                Projeto PR3
            </div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">


                    @auth
                        <p class="mr-6"><span class="font-bold">Bem vindo: </span>{{ auth()->user()->name }}</p>
                        @if (auth()->user()->type == 'professor')
                            <a href="{{ url('/cadastro') }}" class=" ">
                                Cadastrar Curso
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            {{-- <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> --}}

                            <button type="submit">Sair </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                                Cadastro
                            </a>
                        @endif

                    @endauth
                </nav>
            @endif
        </header>

        <main class="bg-gray-300 rounded-md my-4 p-8">

            <h3 class="text-2xl font-bold mb-6">Cursos Disponíveis</h3>
            <div class="grid grid-cols-3 gap-4">

                @foreach ($courses as $curso)
                    @php($videoArray = explode('v=', $curso->video))
                    <div class="@if (!empty(auth()->user()->type) && auth()->user()->type == 'aluno' && $curso->user_id) bg-yellow-200 @else bg-white @endif p-3 rounded-md text-center">
                        <iframe style="width: 100%" src="https://www.youtube.com/embed/{{ $videoArray[1] }}">
                        </iframe>
                        <h3 class="mt-4 mb-4 text-xl font-bold">{{ $curso->name }}</h3>
                        <p class="mt-4 mb-4">{{ $curso->description }}</p>

                        @if (!empty(auth()->user()->type) && auth()->user()->type != 'professor')
                        @auth
                           
                                @if (!$curso->user_id)
                                    <form method="POST" action="{{ route('course.subscribe') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="course_id" value="{{ $curso->id }}">
                                        <button type="submit"
                                            class="bg-gray-500 hover:bg-gray-700 hover:text-white p-2 rounded-none text-center">
                                            Se Inscrever
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('course.unsubscribe') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="course_id" value="{{ $curso->id }}">
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-gray-700 hover:text-white p-2 rounded-none text-center">
                                            Sair do Curso
                                        </button>
                                    </form>

                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-gray-500 hover:bg-gray-700 hover:text-white p-2 rounded-none text-center">
                                    Entre para se Inscrever
                                </a>
                            @endif
                    @endif

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
