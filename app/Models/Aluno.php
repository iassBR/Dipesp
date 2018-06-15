<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Aluno extends Model
{
    protected $fillable = [
        'nome', 'matricula', 'curso_id'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
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

    public function projeto()
    {
    	return $this->hasMany(\App\Models\Projeto::class);
    }

    public function curso()
    {
 	    return $this->belongsTo(\App\Models\Curso::class);
    }
}
