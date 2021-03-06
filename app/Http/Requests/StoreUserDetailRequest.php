<?php

namespace App\Http\Requests;

use App\Models\UserDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_detail_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'nic'             => [
                'string',
                'nullable',
            ],
            'library_card_no' => [
                'string',
                'nullable',
            ],
            'mobile'          => [
                'string',
                'nullable',
            ],
            'address'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
