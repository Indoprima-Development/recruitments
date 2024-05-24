<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatakeluargaRequest extends FormRequest
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
			'user_id' => 'required',
			'status_hubungan' => 'required',
			'nama_keluarga' => 'required',
			'tempat_lahir_keluarga' => 'required',
			'tanggal_lahir_keluarga' => 'required',
			'pekerjaan' => 'required',
			'alamat' => 'required',
        ];
    }
}
