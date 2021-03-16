<?php

declare(strict_types=1);

namespace App\Request\Admin\System;

use Hyperf\Validation\Request\FormRequest;

class UserResquest extends FormRequest
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

    /**
     * @return string[]
     */
    private function getRegisterRules(): array
    {
        return  [
            'name' => 'required|unique:user',
            'nickname' => 'required|string|max:50',
            'password' => 'required|alpha_dash|min:6',
            'roles' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    private function getUpdateRules(): array
    {
        return  [
            'name' => 'required|unique:user',
            'nickname' => 'required|string|max:50',
            'password' => 'required|alpha_dash|min:6',
            'roles' => 'required',
        ];
    }
}
