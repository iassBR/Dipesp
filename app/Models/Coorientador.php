<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coorientador extends Model
{
    public function projeto()
    {
        return $this->hasMany(\App\Models\Projeto::class);
    }

    public function orientador()
    {
    	return $this->hasOne(\App\Models\Orientador::class);
    }
}
