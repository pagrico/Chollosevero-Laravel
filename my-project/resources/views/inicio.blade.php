<x-header />
<!-- Title -->
<div class="pt-32 bg-white text-center mb-10">
    <h1 class="text-2xl font-bold text-gray-800">Todos los Chollos</h1>

    <!-- Botón solo visible para usuarios (id_usuario = 1) -->

    <a href="/inicio/formchollo"
        class="mt-6 inline-block px-8 py-4 bg-blue-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 transform hover:scale-105">
        Añadir Chollo
    </a>


    <!-- Botón solo visible para el administrador (id_usuario = 1) -->
    <a href="inicio/admin"
        class="mt-6 ml-4 inline-block px-8 py-4 bg-red-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 transition-all duration-300 transform hover:scale-105">
        Panel Admin
    </a>
</div>
@php
    use App\Models\Chollos;
    $chollo = Chollos::all();
@endphp
<section class="py-10 bg-gray-100">
    <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($chollo as $item)
            <article
                class="relative rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300">
                <a href="/inicio/chollo/{{ $item->id }}">
                    <div class="relative flex items-end overflow-hidden rounded-xl">
                        <img src="<{{ $item->imagen_chollo }}" alt="{{ $item->titulo_chollo }}"
                            class="w-full h-48 object-cover rounded-xl" />
                    </div>
                    <div class="mt-1 p-2 mb-10">
                        <h2 class="text-slate-700 font-semibold"> {{ $item->titulo_chollo }} </h2>
                        <p class="mt-1 text-sm text-slate-400">
                            {{ $item->descripcion_chollo }}
                        </p>
                    </div>
                    <div class="absolute bottom-3 left-3 right-3 flex justify-between items-center">
                        <p class="text-lg font-bold text-blue-500">
                            {{ $item->precio_chollo }}
                        </p>
                        <div
                            class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <button class="text-sm">Añadir</button>
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
</section>



<x-footer />
