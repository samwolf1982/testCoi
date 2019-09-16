<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $fillable = [
        'uah', 'usd', 'eur','product_id'
    ];
//amount
    public static  function boot()
    {
        parent::boot();

//        static::creating(function ($model){
//
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
//
//        self::deleted(function($model){
//            // ... code here
//        });



    }


}
