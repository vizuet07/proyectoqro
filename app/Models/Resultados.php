<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    use HasFactory;
        // Especifica que la clave primaria
        protected $primaryKey = 'ID_Resultado';
        // Desactiva las marcas de tiempo automáticas
        public $timestamps = false;
}
