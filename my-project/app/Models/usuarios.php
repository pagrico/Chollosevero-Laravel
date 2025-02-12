<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    /**
     * Por convención, Laravel espera que la tabla se llame igual que
     * el modelo en plural; si tu tabla se llama 'usuarios', este
     * atributo es opcional (funcionaría igual).
     * Pero es buena práctica indicarlo explícitamente.
     */
    protected $table = 'usuarios';

    /**
     * Si tu primary key se llama 'id', esto es opcional,
     * pero lo dejamos escrito para mayor claridad.
     */
    protected $primaryKey = 'id';

    /**
     * Si tus columnas timestamps se llaman 'created_at' y 'updated_at'
     * no hace falta indicar nada más; Laravel las gestiona por defecto.
     */
    public $timestamps = true;

    /**
     * Aquí indicas qué campos se pueden asignar "en masa" (mass assignment),
     * por ejemplo si usas $user->fill([...]) o Usuarios::create([...]).
     */
    protected $fillable = [
        'nombre_usuario',
        'contrasena_usuario',
        'correo_usuario',
        'id_rol',
        // 'created_at', 'updated_at' normalmente no se ponen en fillable
        // porque las gestiona Laravel automáticamente.
    ];

    /**
     * Si quisieras definir alguna relación, por ejemplo con un modelo Roles,
     * podrías hacerlo aquí:
     *
     * public function rol()
     * {
     *     return $this->belongsTo(Rol::class, 'id_rol');
     * }
     */
}
