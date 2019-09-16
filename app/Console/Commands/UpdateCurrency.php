<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:currency';
    private $url='';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->url='https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11' ; //01.12.2014'
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo 'kernel oki'.PHP_EOL;
          $json = file_get_contents($this->url);
          $eur=false;
          $usd=false;
        foreach (json_decode($json) as $item) {
            switch ($item->ccy){
                case "EUR":
                    $eur=$item->buy;
                break;
                case "USD":
                    $usd=$item->buy;
                    break;
            }
         }
        $key=config('app.currency_key_cache');
        $arr=[
            'usd'=>$usd,
            'eur'=>$eur,
        ];
        Cache::put($key, $arr, 60*60*24);
//        $value = Cache::get($key);
    }
}
