<?php

declare(strict_types=1);

namespace App\Request\Admin\System;

use Hyperf\Validation\Request\FormRequest;

class PermissionResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:10',
            'title' => 'required|max:20',
            'pid' => 'required|min:6',
        ];
    }

    public function attributes(): array
    {
        return [
            'pid' => '父级必须',
            'title' => '名称必须',
            'name' => '规则必须',
        ];
    }
}
