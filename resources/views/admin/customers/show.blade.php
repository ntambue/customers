@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.id') }}
                        </th>
                        <td>
                            {{ $customer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.firstname') }}
                        </th>
                        <td>
                            {{ $customer->firstname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.lastname') }}
                        </th>
                        <td>
                            {{ $customer->lastname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.middlename') }}
                        </th>
                        <td>
                            {{ $customer->middlename }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.address') }}
                        </th>
                        <td>
                            {{ $customer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.city') }}
                        </th>
                        <td>
                            {{ $customer->city->state ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.state') }}
                        </th>
                        <td>
                            {{ $customer->state->country ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.country') }}
                        </th>
                        <td>
                            {{ $customer->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.zip') }}
                        </th>
                        <td>
                            {{ $customer->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.age') }}
                        </th>
                        <td>
                            {{ $customer->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.birthdate') }}
                        </th>
                        <td>
                            {{ $customer->birthdate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.department') }}
                        </th>
                        <td>
                            {{ $customer->department->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.photo') }}
                        </th>
                        <td>
                            @if($customer->photo)
                                <a href="{{ $customer->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $customer->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection