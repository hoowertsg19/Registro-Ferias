<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha', 'lugar', 'descripcion'];

    protected $casts = [
        'fecha' => 'date',  // así $this->fecha es instancia Carbon
    ];

    public function emprendedores()
    {
        return $this->belongsToMany(Emprendedor::class, 'feria_emprendedor');
    }
}