<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisposisiRequest extends FormRequest
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
            'no_disposisi' => 'required',
            'tanggal_disposisi' => 'required|date',
            'tujuan_disposisi' => 'required',
            'file_disposisi' => 'required|mimes:jpeg,png,pdf',
            'note' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'no_disposisi.required' => 'Nomer Disposisi tidak boleh kosong',
            'tanggal_disposisi.required' => 'Tanggal disposisi tidak boleh kosong',
            'tujuan_disposisi.required' => 'Tujuan disposisi tidak boleh kosong',
            'file_disposisi.required' => 'File disposisi tidak boleh kosong',
            'note.required' => 'Note tidak boleh kosong',
            'tanggal_disposisi.date' => 'Tanggal disposisi harus berupa waktu',
            'file_disposisi.mimes' => 'File Disposisi harus berupa file png, jpeg, pdf'
        ];
    }
}
