<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    protected $table = 'characters';

    protected $fillable = ['name', 'height', 'hair_color', 'skin_color', 'eye_color', 'birth_year', 'gender'];
}
