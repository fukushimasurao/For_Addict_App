<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryUpdateRequest extends FormRequest
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
            'id' => ['integer','required'],
            'importance' => ['required', 'integer', 'between:1,5'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'elapsed_time' => ['required', 'integer', 'between:1,300'],
            'feeling' => ['required', 'filled', 'string', 'between:1,1000'],
            'coping_measures' => ['required','filled', 'string', 'between:1,1000'],
        ];
    }


        /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'importance' => '重要度',
            'date' => '記録日',
            'time' => '症状発生時間',
            'elapsed_time' => '症状が続いた時間',
            'feeling' => '「その時の気分感情」',
            'coping_measures' => '「症状への対処法・反省点」',
        ];
    }

    public function messages()
    {
        return [
            'importance.required' => ':attributeは選択肢から選んでください。',
            'importance.integer' => ':attributeは選択肢から選んでください。',
            'importance.between' => ':attributeは選択肢から選んでください。',

            'elapsed_time.required' => ':attributeは必ず入力してください。',
            'elapsed_time.integer' => ':attributeは半角数字で入力してください。',
            'elapsed_time.between' => ':attributeは1〜300の間で指定してください',

            'feeling.required' => ':attributeは入力してください。',
            'feeling.filled' => ':attributeは入力してください。',
            'feeling.string' => ':attributeは入力してください。',

            'coping_measures.required' => ':attributeは入力してください。',
            'coping_measures.filled' => ':attributeは入力してください。',
            'coping_measures.string' => ':attributeは入力してください。',
        ];
    }
}
