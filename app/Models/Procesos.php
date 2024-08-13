<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
    use HasFactory;
        // Especifica que la clave primaria
        protected $primaryKey = 'ID_Proceso';
        // Desactiva las marcas de tiempo automáticas
        public $timestamps = false;
}
