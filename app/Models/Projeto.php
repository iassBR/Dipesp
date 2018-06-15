<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Projeto extends Model
{
    protected $fillable = [
        'titulo', 'ano_publicacao', 'orientador_id', 'aluno_id', 'area_pesquisa_id',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });

        self::deleted(function ($model) {
            $model->arquivo()->first()->delete();
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    
    public function area_pesquisa()
    {
    	return $this->belongsTo(\App\Models\AreaPesquisa::class);
    }

    public function orientador()
    {
    	return $this->belongsTo(\App\Models\Orientador::class);
    }

    public function aluno()
    {
    	return $this->belongsTo(\App\Models\Aluno::class);
    }

    public function arquivo()
    {
        return $this->belongsTo(\App\Models\Arquivo::class);
    }

    public function coorientador()
    {
    	return $this->belongsTo(\App\Models\Coorientador::class);
    }
}
