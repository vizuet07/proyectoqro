<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;
    // Especifica que la clave primaria
    protected $primaryKey = 'ID_Pieza';
    // Desactiva las marcas de tiempo automáticas
    public $timestamps = false;


}
