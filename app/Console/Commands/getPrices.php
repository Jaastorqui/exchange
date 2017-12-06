<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Code;
use App\Price;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;



class getPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getPrices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Price::truncate();
        $this->setCodes();

        
        $codes = Code::All();

        
        foreach ($codes as $code) {
            $rates = $this->callAPI($code->name);

            foreach ($rates as $key => $rate) {
                
                $price = new Price;
                $price->price = $rate;
                $price->origin = $code->id;

                $destiny = Code::where("name", $key)->first();
                if ($destiny == null ) 
                    continue;
                $price->destiny = $destiny->id;
                
                if ( $destiny == null ) 
                {
                    dd( $key );
                }
                $price->save();
            }
            
        }


        Log::info('\n Se ha acabado la migracion \n');

        

    }



    private function callAPI($name) 
    {
        $client = new Client();
        $res = $client->get('http://api.fixer.io/latest?base=' . $name);
        $response = json_decode($res->getBody());

        return $response->rates;

    }

    private function setCodes ()
    {
        $arra = array("EUR", "USD", "GBP", "CZK", "HUF");
        Code::truncate();
        foreach ($arra as $value) {
            $code = new Code;
            $code->name = $value;
            $code->save();
        }
    }

}
