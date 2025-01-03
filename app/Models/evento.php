<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'user_id',
        'nombreEvento',
        'descripcion',
        'fechaInicio',
        'fechaFin',
        'categoria_id',
        'publico',
        'direccion',
        'latitude', 
        'longitude',
    ];


    public function scopeFiltrarPorCategoria($query, $categoriaId)
    {
        if ($categoriaId) {
            return $query->where('categoria_id', $categoriaId);
        }
    
        return $query;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function invitaciones()
    {
        return $this->hasMany(Invitacion::class, 'event_id');
    }

    public function permisos()
    {
        return $this->hasMany(Permiso::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'permisos')
                    ->withPivot(['asistencia', 'verEvento', 'invitar', 'eliminarIvitado', 'modificar', 'eliminarEvento', 'darPermisos'])
                    ->withTimestamps();

    }
}
