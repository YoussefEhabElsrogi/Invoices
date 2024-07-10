<?php

namespace App\Http\Requests;

use App\Models\Section;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Section $section): array
    {
        return [
            'section_name' => 'required|string|max:255|unique:sections,section_name,' . $section->id,
            'description' => 'required|string',
        ];
    }
    public function attributes()
    {
        return [
            'section_name' => 'اسم القسم',
            'description' => 'الوصف',
        ];
    }
    public function messages()
    {
        return [
            'section_name.required' => 'يرجي ادخال اسم القسم',
            'section_name.string' => 'يجب أن يكون :attribute نصًا.',
            'section_name.unique' => 'قيمة :attribute موجودة بالفعل في قاعدة البيانات.',
            'section_name.max' => 'يجب ألا يتجاوز طول :attribute أكثر من :max أحرف.',
            'description.required' => 'يرجي ادخال الوصف',
            'description.string' => 'يجب أن يكون :attribute نصًا.',
        ];
    }
}
