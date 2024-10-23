<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';
    protected $fillable = ['user_id','nombreEvento','descripcion','fechaInicio','fechaFin','color','allDay'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
