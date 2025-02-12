<x-header />

@php
    use App\Models\Chollos;
    use App\Models\Usuarios;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Request;

    // --- LÓGICA DE ELIMINACIÓN (NO RECOMENDADA EN LA VISTA) ---
    // Detectamos la URL para ver si es una solicitud de eliminación de usuario o de chollo.
    $urlPath = Request::path();

    // Si se accede a 'admin/delete_user/XX'
    if (Str::startsWith($urlPath, 'admin/delete_user/')) {
        $id = (int) Str::after($urlPath, 'admin/delete_user/');
        $usuario = Usuarios::find($id);

        if ($usuario) {
            $usuario->delete();
        }

        // Redirigimos de nuevo al panel para evitar que el usuario
        // siga en una ruta que ya no debería existir
        header('Location: ' . url('admin/panel'));
        exit();
    }

    // Si se accede a 'admin/delete_chollo/XX'
    if (Str::startsWith($urlPath, 'admin/delete_chollo/')) {
        $id = (int) Str::after($urlPath, 'admin/delete_chollo/');
        $chollo = Chollos::find($id);

        if ($chollo) {
            $chollo->delete();
        }

        // Redirigimos de nuevo al panel
        header('Location: ' . url('admin/panel'));
        exit();
    }
    // --- FIN DE LA LÓGICA DE ELIMINACIÓN ---

    // Cargamos los datos para mostrarlos en las tablas
    $usuarios = Usuarios::all();
    $chollos = Chollos::all();
@endphp

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Panel de Administración</h1>

    <!-- Tabla de Usuarios -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Usuarios</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Correo</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($usuarios as $usuario)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $usuario->id_usuario }}</td>
                            <td class="py-3 px-6 text-left">{{ $usuario->nombre_usuario }}</td>
                            <td class="py-3 px-6 text-left">{{ $usuario->correo_usuario }}</td>
                            <td class="py-3 px-6 text-center">
                                <!-- Enlace para eliminar usuario -->
                                <a href="{{ url('admin/delete_user/' . $usuario->id_usuario) }}"
                                    class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition-colors duration-200">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla de Chollos -->
    <div>
        <h2 class="text-2xl font-semibold mb-4">Chollos</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Título</th>
                        <th class="py-3 px-6 text-left">Descripción</th>
                        <th class="py-3 px-6 text-left">Precio</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($chollos as $chollo)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $chollo->id_chollo }}</td>
                            <td class="py-3 px-6 text-left">{{ $chollo->titulo_chollo }}</td>
                            <td class="py-3 px-6 text-left">{{ $chollo->descripcion_chollo }}</td>
                            <td class="py-3 px-6 text-left">{{ $chollo->precio_chollo }}</td>
                            <td class="py-3 px-6 text-center">
                                <!-- Enlace para eliminar chollo -->
                                <a href="{{ url('admin/delete_chollo/' . $chollo->id_chollo) }}"
                                    class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition-colors duration-200">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-footer />
