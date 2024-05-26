<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatadiriRequest extends FormRequest
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
			// 'name' => 'required',
			// 'gender' => 'required',
			// 'tempat_lahir' => 'required',
			// 'tanggal_lahir' => 'required',
			// 'agama' => 'required',
			// 'alamat' => 'required',
			// 'no_hp' => 'required',
			// 'no_wa' => 'required',
			// 'status_rumah' => 'required',
			// 'golongan_darah' => 'required',
			// 'tinggi_badan' => 'required',
			// 'berat_badan' => 'required',
			// 'ktp' => 'required',
			// 'kendaraan' => 'required',
			// 'sim' => 'required',
        ];
    }
}
