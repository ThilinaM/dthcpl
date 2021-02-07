<?php

namespace App\Http\Requests;

use App\Models\BasicDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBasicDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('basic_detail_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
