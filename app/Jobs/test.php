<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Queue;

class test implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $chunks;

    public function __construct($chunks)
    {
        //
        $this->chunks = $chunks;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        foreach($this->chunks as $item){
            

            Queue::create($item);   //create 需要是陣列
            // $insert = array(
            //     'County' => $item->County,
            //     'PublishAgency' => $item->PublishAgency,    
            //     'PublishTime' => $item->PublishTime,
            //     'SiteName' => $item->SiteName,
            //     'UVI' => $item->UVI,
            //     'WGS84Lat' => $item->WGS84Lat,
            //     'WGS84Lon' => $item->WGS84Lon
            // );

            // Queue::insert($insert);

        }
    }
}
