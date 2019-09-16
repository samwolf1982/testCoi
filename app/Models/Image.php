<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{

    protected $attributes = [
        'sort' => 0,
    ];

    public static function boot()
    {
        parent::boot();

//        static::creating(function ($model) {
//            $model->user_id = auth()->user()->id;
//        });

//        self::created(function($model){
//
//        });


//        self::creating(function($model){
//            // ... code here
//        });
//
//
//
//        self::updating(function($model){
//            // ... code here
//        });
//
//        self::updated(function($model){
//            // ... code here
//        });
//
//        self::deleting(function($model){
//            // ... code here
//        });
        self::deleted(function($model){
            $filename=app_path().'/public'.$model->name;
            File::delete($filename);
        });
    }

}
