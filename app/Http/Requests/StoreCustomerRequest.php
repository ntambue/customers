<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'firstname'     => [
                'required',
            ],
            'lastname'      => [
                'required',
            ],
            'middlename'    => [
                'required',
            ],
            'address'       => [
                'required',
            ],
            'city_id'       => [
                'required',
                'integer',
            ],
            'state_id'      => [
                'required',
                'integer',
            ],
            'country_id'    => [
                'required',
                'integer',
            ],
            'age'           => [
                'required',
            ],
            'birthdate'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'department_id' => [
                'required',
                'integer',
            ],
            'photo'         => [
                'required',
            ],
        ];
    }
}
