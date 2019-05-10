<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "name"          =>  "required|unique:categories,name,".request()->segment(3),
            "job_title"     =>  "required",
            "email"         =>  "required|email",
            "fle_photo"     =>  "image|mimes:jpeg,png,jpg,gif,svg|required|max:100000", 
            "facebook_url"  =>  "required|url",
            "twitter_url"   =>  "nullable|url",
            "linkedin_url"  =>  "nullable|url",
            "youtube_url"   =>  "nullable|url"
        ];
    }
}