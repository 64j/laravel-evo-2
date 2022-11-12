<?php

declare(strict_types=1);

namespace Manager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'templatename' => ['required', 'string'],
//            'templatealias' => ['string'],
            'description' => ['string'],
            'editor_type' => ['int'],
            'category' => ['int'],
//            'icon' => ['string', 'nullable'],
            'template_type' => ['int'],
            'content' => ['string', 'nullable'],
            'locked' => ['int'],
            'selectable' => ['int'],
//            'createdon' => ['date'],
//            'editedon' => ['date'],
        ];
    }
}
