<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuitarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //returning true means we are authorized to make a request.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'brand' => 'required',
            'year_made' => ['required', 'integer'],
            // This rules are based on names from our form inputs
            
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 'guitar-name' => strip_tags($this['guitar-name']),
            // 'guitar-name' => strip_tags($this['guitar-name']),
            // 'brand' => strip_tags($this->brand),
            // 'year' => strip_tags($this->year),
            // pulls in data from our form and merges it into the object that will be created from this class
            'name' => strip_tags($this->name),
            'brand' => strip_tags($this->brand),
            'year_made' => strip_tags($this->year_made),
            // This names are based on names on our form inputs

        ]);
    }
}
