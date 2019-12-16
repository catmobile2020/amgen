<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
            'answer_id'=>'required|exists:answers,id',
            'question_id'=>'required|exists:questions,id',
            'set_id'=>'required|exists:sets,id',
            'team_id'=>'required|exists:teams,id',
        ];
    }
}
