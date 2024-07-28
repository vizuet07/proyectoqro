<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;
    protected $table ='piezas';
    protected $fillable = [
        'serial_number',
        'part_status',
    ];

}
