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
            case 'PATCH':
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
            'id' => 'required|max:10',
        ];
    }

    private function getUpdateRules()
    {
        return  [
            'id' => 'required|max:10',
        ];
    }
}
