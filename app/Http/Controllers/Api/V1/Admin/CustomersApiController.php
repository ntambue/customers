<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\Admin\CustomerResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource(Customer::with(['city', 'state', 'country', 'department'])->get());
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        if ($request->input('photo', false)) {
            $customer->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource($customer->load(['city', 'state', 'country', 'department']));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        if ($request->input('photo', false)) {
            if (!$customer->photo || $request->input('photo') !== $customer->photo->file_name) {
                if ($customer->photo) {
                    $customer->photo->delete();
                }

                $customer->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($customer->photo) {
            $customer->photo->delete();
        }

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
