<?php

namespace App\Http\Web\UserWork\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class UpdateUserWorkRequest extends FormRequest
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
        return [];
    }

    /**
     * 
     * 
     *
     */
    public function convert()
    {
        return collect([
            'user_work_list_id' => $this->input('user_work_list_id'),
            'id' => $this->input('id'),
            'start_time' => $this->input('start_time'),
            'end_time' => $this->input('end_time'),
            'break_time' => $this->input('break_time'),
            'over_time' => $this->input('over_time')
        ]);
    }
}
