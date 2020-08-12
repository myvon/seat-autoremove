<?php


namespace Lvlo\Autoremove\Http\Validation;


use Illuminate\Foundation\Http\FormRequest;

class AddCorporation extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'corporation_id' => 'required',
        ];
    }


}