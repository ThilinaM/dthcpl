<?php

namespace App\Http\Requests;

use App\Models\BasicDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBasicDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('basic_detail_create');
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
