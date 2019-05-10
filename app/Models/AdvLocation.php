<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvLocation extends Model
{

function Adv(){
                            //Table           Foreign Key   Primary Key
        return $this->hasMany(Advs::class, "adv-locations-id", "id");
    }
}
