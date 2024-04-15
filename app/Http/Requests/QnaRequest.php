<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QnaRequest extends FormRequest
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
			'exam_id' => 'required',
			'user_id' => 'required',
			'question' => 'required',
			'answer1' => 'required',
			'answer2' => 'required',
			'answer3' => 'required',
			'answer4' => 'required',
			'answer5' => 'required',
			'key' => 'required',
			'question_img' => 'required',
			'answer1_img' => 'required',
			'answer2_img' => 'required',
			'answer3_img' => 'required',
			'answer4_img' => 'required',
			'answer5_img' => 'required',
        ];
    }
}
