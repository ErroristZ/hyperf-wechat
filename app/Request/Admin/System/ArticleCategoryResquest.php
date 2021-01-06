<?php

declare(strict_types=1);

namespace App\Request\Admin\System;

use Hyperf\Validation\Request\FormRequest;

class ArticleCategoryResquest extends FormRequest
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
            'name' => 'required|max:10',
            'pid' => 'required|max:2',
            'disable' => 'required|max:2',
        ];
    }

    private function getUpdateRules()
    {
        return  [
            'name' => 'required|max:10',
            'pid' => 'required|max:2',
            'disable' => 'required|max:2',
        ];
    }
}
