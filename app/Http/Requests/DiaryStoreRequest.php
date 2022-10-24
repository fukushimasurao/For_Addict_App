<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryStoreRequest extends FormRequest
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
        return [
            'user_id' => ['integer','required'],
            'importance' => ['required', 'integer', 'between:1,5'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date'],
            'elapsed_time' => ['required', 'integer', 'between:1,300'],
            'feeling' => ['required', 'filled', 'string'],
            'coping_measures' => ['required','filled', 'string'],
        ];
        ;
    }
}
