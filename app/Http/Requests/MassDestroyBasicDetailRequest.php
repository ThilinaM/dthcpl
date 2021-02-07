<?php

namespace App\Http\Requests;

use App\Models\BasicDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBasicDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('basic_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:basic_details,id',
        ];
    }
}
