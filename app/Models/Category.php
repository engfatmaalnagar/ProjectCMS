<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'deleted',
    ];

    public function articles(){
        return $this->hasMany("App\Models\Article",'categories_id','id');
    }
}
