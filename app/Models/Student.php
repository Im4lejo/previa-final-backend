<?php

namespace App\Models;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'expediente'

    ];
    public function Modules()
    {
        return $this->belongsToMany(Module::class);
    }
}
