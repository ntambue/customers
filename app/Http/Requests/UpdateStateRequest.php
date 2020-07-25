<?php

namespace App\Http\Requests;

use App\State;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateStateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('state_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'country' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
