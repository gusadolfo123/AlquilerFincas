<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmUpdateRequest extends FormRequest
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
            'nombre' => 'required', 
            'descripcion' => 'required', 
            'precio_Tbaja' => 'required', 
            'precio_Talta' => 'required', 
            'precio_Tmedia' => 'required',
            'direccion' => 'required', 
            'max_personas' => 'required',
            'cant_habitaciones' => 'required', 
            'cant_banios' => 'required', 
            'departamento_id' => 'required', 
            'via_id' => 'required',            
            'slug' => 'required|unique:fincas,slug,' . $this->id,
        ];
    }
}
