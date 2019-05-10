<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable  = [
        'name', 'job_title', 'email', 'photo', 'details', 'facebook_url', 'twitter_url', 'linkedin_url', 'youtube_url', 'deleted'];
}