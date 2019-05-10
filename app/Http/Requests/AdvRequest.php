<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required', 
            'url'=>'nullable|url', 
            'photo'=>'nullable',
            'code'=>'nullable', 
            'adv_locations_id'=>'required',
            'start_at'=>'required|date',
            'expire_at'=>'required|date'
     
        ];
    }
}
