<?php

declare(strict_types=1);

namespace App\Request\Admin\System;

use Hyperf\Validation\Request\FormRequest;

class ArticleResquest extends FormRequest
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
     */
    public function rules(): array
    {
        switch ($this->getMethod())
        {
            case 'POST':
                return $this->getRegisterRules();
                break;
            case 'PUT':
                return $this->getUpdateRules();
                break;
        }
    }

    public function attributes(): array
    {
        return [
            'id' => 'ID',
        ];
    }

    private function getRegisterRules()
    {
        return  [
            'category_id' => 'required|max:10',
            'content' => 'required|string|between:2,5000',
            'image' => 'required|string|between:2,100',
            'title' => 'nullable|string|between:2,100',
            'top' => 'required|max:2',
        ];
    }

    private function getUpdateRules()
    {
        return  [
            'category_id' => 'required|max:10',
            'content' => 'required|string|between:2,5000',
            'image' => 'required|string|between:2,100',
            'title' => 'nullable|string|between:2,100',
            'top' => 'required|max:2',
        ];
    }
}
