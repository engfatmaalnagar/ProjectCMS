<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title','sub_title','summary','date','details','writer_id','categories_id',
        'types_id','photos_id','published','in_home','deleted',
    ];
    //relationship between writer and article one to many
    public function writer(){

        return $this->belongsTo('App\Models\Writer','writer_id');

    }
    //relationship between category and article one to many
    public function category(){

        return $this->belongsTo('App\Models\Category','categories_id');

    }
    //relationship between type and article one to many
    public function type(){

        return $this->belongsTo('App\Models\Type','types_id');

    }

    //relationship between photo and article many to many
    public function photos(){

        return $this->belongsTo('App\Models\Photo','photos_id','id');

    }
}