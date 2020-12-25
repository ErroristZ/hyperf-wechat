<?php

declare(strict_types=1);

namespace App\Request\Wechat;

use Hyperf\Validation\Request\FormRequest;

class UserResquest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:10',
            'password' => 'required|min:6',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '姓名',
            'password' => '密码',
        ];
    }
}
