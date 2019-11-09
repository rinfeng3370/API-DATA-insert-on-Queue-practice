<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use App\Queue;
use App\Jobs\test;

class queueController extends Controller
{
    //
    function index(){
        // phpinfo();
        $client = new Client();
        $url='https://opendata.epa.gov.tw/api/v1/UV?%24skip=0&%24top=1000&%24format=json&token=aGY0lrFlz0SPAdcjHt2Mmw';
        $res = $client->request('get',$url,['verify' => false]);
        $data = json_decode($res->getBody()->getContents(),true);
        
        $collection = collect($data);
        $count = $collection->count();
       
        $page = 1;
        
        $perPage = 3;
        $totalpage = (int)ceil($count/$perPage);
        
        
        // `dd($chunks);`
        
        while($page <= $totalpage){
            $chunks = $collection->forPage($page,$perPage);
            
            $this->dispatch(new test($chunks));

            $page = $page + 1;

            
        }
        
        
    }

    // function test(){
    //     $test = "AAA";
    //     $this->dispatch(new test($test));
    // }
}
