<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait TimestampsTraite {

    public  $timestamps = true;

    public function getDate(){
        return['create_at','updated_at'];

    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    public function getUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}

