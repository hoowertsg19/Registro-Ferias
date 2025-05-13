<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprendedor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'telefono', 'rubro'];

    public function ferias()
    {
        return $this->belongsToMany(Feria::class);
    }
}
