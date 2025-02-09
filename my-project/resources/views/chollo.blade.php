<x-header />
@php
    use App\Models\Chollos;
    $chollo = Chollos::find($id);
@endphp
<div class="container mx-auto px-4 py-16">
    <div class="flex flex-col lg:flex-row lg:space-x-8">
        <!-- Imagen -->
        <div class="lg:w-1/2">
            <img src="{{ $chollo->imagen_chollo }}" alt="{{ $chollo->titulo_chollo }}" class="rounded-lg shadow-md"
                style="width: 643px; height: 643px; object-fit: contain;">
        </div>

        <!-- Detalles -->
        <div class="lg:w-1/2 mt-8 lg:mt-0">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ $chollo->titulo_chollo }}
            </h1>
            <p class="mt-4 text-gray-600">
                {{ $chollo->descripcion_chollo }}
            </p>
            <p class="mt-6 text-3xl font-semibold text-blue-500">
                {{ $chollo->precio_chollo }}
            </p>

            <!-- Botón añadir al carrito -->
            <div class="mt-6">
                <button
                    class="flex items-center justify-center px-8 py-3 bg-blue-500 text-white text-lg font-semibold rounded-lg shadow-lg transform transition-all hover:scale-105 hover:bg-blue-600 focus:outline-none">
                    Añadir al carrito
                </button>
            </div>

            <!-- if Botón eliminar (solo para creador o administrador) -->
            <div class="mt-4">
                <form action="eliminar_chollo.php" method="POST"
                    onsubmit="return confirm('¿Seguro que deseas eliminar esta oferta?');">
                    <input type="hidden" name="{{ $chollo->id }}" value="{{ $chollo->id }}">
                    <button type="submit"
                        class="px-6 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600">
                        Eliminar Oferta
                    </button>
                </form>
            </div>

            <!--fin if-->
        </div>
    </div>
</div>
<x-footer />
