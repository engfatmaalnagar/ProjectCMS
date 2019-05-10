<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    protected $fillable = [
        "title", 
        "url", 
        "photo",
        "code", 
        "is_code",
        "adv_locations_id",
        "deleted",
        "start_at",
        "expire_at"
    ];

    function AdvLocations(){
                                //Table         Foreign key     Primary key
        return $this->belongsTo(Adv_locations::class, "adv_locations_id", "id");
    }
}
