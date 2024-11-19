<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'fecha_inicio',
        'fecha_fin',
        'categoria',
        'imagen',
        'user_id', // Este campo será asignado si es necesario
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
