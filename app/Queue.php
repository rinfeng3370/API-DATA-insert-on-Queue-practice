<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    //
    protected $table = "queues";
    protected $fillable = ['County','PublishAgency','PublishTime','SiteName','UVI','WGS84Lat','WGS84Lon'];
    public $timestamps = false;
}
