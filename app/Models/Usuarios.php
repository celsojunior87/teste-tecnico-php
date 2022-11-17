<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    public $table = "usuarios";

    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];
}
