<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'category_id' => 'required',
            'position' => 'required',
            'position_level_id' => 'required',
            'number_vacancy' => 'required',
            'work_schedule_id' => 'required',
            'description' => 'required',
            'education_id' => 'required',
            'work_experience_id' => 'required',
            'gender_id' => 'required',
            'status_id' => 'required',
            'skill' =>  'required',
        ];
    }
}
