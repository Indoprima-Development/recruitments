<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PtkformRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
        [
			'division_id' => 'required',
			'department_id' => 'required',
			'section_id' => 'required',
			'jobtitle_id' => 'required',
			'education_id' => 'required',
			'major_id' => 'required',
			'date_startwork' => 'required',
			'direct_superior' => 'required',
			'direct_junior' => 'required',
			'responsibility' => 'required',
			'gender' => 'required',
			'ipk' => 'required',
			'special_conditions' => 'required',
			'general_others' => 'required',
			'request_basis' => 'required',
			'request_basis_for' => 'required',
			'status' => 'required',
        ];
    }
}
