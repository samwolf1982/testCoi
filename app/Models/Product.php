<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    protected $fillable = [
        'name', 'status', 'sort', 'description'
    ];
    protected $attributes = [
        'sort' => 0,
    ];

    public function saveImages($request)
    {
        $this->saveImageFiles($request);
    }

    private function saveImageFiles($request)
    {
        if ($request->hasfile('images')) {
            $data = [];
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $pathToFolder = '/images/products/' . $this->user_id . '/';
                $image->move(public_path() . $pathToFolder, $name);
                $data[] = $pathToFolder . $name;
            }
            $this->saveImagesModels($data);
        }
    }

    private function saveImagesModels($imagesList)
    {
        foreach ($imagesList as $imageName) {
            $image = new Image();
            $image->name = $imageName;
            $image->product_id = $this->id;
            $image->save();
        }
    }

    public function updatePrice($requestAll){
            Currency::where('product_id', $this->id)->delete();
            $this->savePrice($requestAll);
    }
    public function savePrice($requestAll)
    {
        $basePrice = str_replace(',', '.', $requestAll['amount']);
        $key = config('app.currency_key_cache');
        $value = Cache::get($key);
        if (empty($value) or empty($value['usd']) or empty($value['eur'])) {
            $value['usd'] = config('app.defaultUSD');
            $value['eur'] = config('app.defaultEUR');
        }
        $currencyArrayData = [
            'product_id' => $this->id,
            'uah' => $basePrice,
            'usd' => $basePrice / $value['usd'],
            'eur' => $basePrice / $value['eur'],
        ];
        Currency::create($currencyArrayData);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });

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
        self::deleted(function($model){
            Currency::where('product_id', $model->id)->delete();
            Image::where('product_id', $model->id)->delete();
        });


    }


    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function firstImage()
    {
        if (isset($this->images[0])) {
            return $this->images[0]->name;
        } else {
            return config('view.placeholder');
        }
    }

    public function price()
    {
        return $this->hasOne('App\Models\Currency');
    }

    public function priceByCode($code = 'uah')
    {
        if(empty($code)){
            $code = '';
            if (!empty($_COOKIE['currency_code'])) {
                $code = $_COOKIE['currency_code'];
            };
        }
         return $this->price->{$code};
    }

}
