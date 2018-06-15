<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Orientador extends Model
{

	public $table = 'orientadores';
	
    protected $fillable = [
    	"nome","matricula"
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

    public function coorientador()
    {
    	return $this->belongsTo(\App\Models\Coorientador::class);
    }
}
