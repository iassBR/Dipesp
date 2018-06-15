<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Papel;
class Permissao extends Model
{
    protected $table = 'permissoes';
    protected $fillable = ['nome', 'descricao'];  


    public function papeis(){
        return $this->belongsToMany('App\Models\Papel');
    }

    
}