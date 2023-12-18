<?php

namespace App\Http\Requests\Dashboard\Jurnal;

use Illuminate\Foundation\Http\FormRequest;

class JurnalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getjurnal()
    {
        return $this->jurnal;
    }
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
