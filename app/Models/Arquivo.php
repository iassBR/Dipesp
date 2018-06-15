<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class Arquivo extends Model 
{
    public $timestamps = false;

    //do not add a '/' at the end of the path, laravel automatically creates in the storage method
    protected $defaultFileFolder = 'public/projetos';

    protected $fillable = [
        'descricao', 'descricao', 'mime', 'path'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });

        self::deleting(function ($model) {
            $model->destroyFileFromServer();
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
        return $this->hasOne(\App\Models\Projeto::class);
    }

    public function saveFileOnServer($file, String $fileName)
    {
        $extension = $file->extension();
        
        $this->mime = $file->getClientMimeType();
        $this->descricao = "{$fileName}.{$extension}";
        
        $upload = $file->store($this->defaultFileFolder);
        if ($upload) {
            $this->path = $upload;
            return true;
        }
        
        $this->destroyFileFromServer();
        return false;
    }

    public function destroyFileFromServer() 
    {
        try {
            Storage::delete($this->path);
        } catch(\Excepition $erro) {
            return $erro->getMessage();
        }
    }

    public function updateFileOnServer($file)
    {
        $oldFileContent =  Storage::get($this->path);
        $this->destroyFileFromServer();
        if ($this->saveFileOnServer($file, $this->descricao)) {
            return true;
        }
    }
}