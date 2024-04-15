<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Qna_transactionRequest extends FormRequest
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
			'qna_id' => 'required',
			'user_id' => 'required',
			'answer' => 'required',
			'is_true' => 'required',
        ];
    }
}
