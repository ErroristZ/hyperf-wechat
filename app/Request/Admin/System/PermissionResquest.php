<?php

declare(strict_types=1);

namespace App\Request\Admin\System;

use Hyperf\Validation\Request\FormRequest;

class PermissionResquest extends FormRequest
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
            'title' => 'nullable|string|between:2,100',
        ];
    }

    private function getUpdateRules()
    {
        return  [
            'name' => 'required|max:10',
            'pid' => 'required|max:2',
            'title' => 'nullable|string|between:2,100',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请填写名称',
            'pid' => '请填写pid',
            'title' => '请填写密码',
            'name.unique' => '名称已经存在'
        ];
    }
}
