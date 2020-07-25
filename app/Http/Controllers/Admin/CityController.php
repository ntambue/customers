<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCityRequest;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\State;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('city_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all();

        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = State::all()->pluck('country', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cities.create', compact('names'));
    }

    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->all());

        return redirect()->route('admin.cities.index');
    }

    public function edit(City $city)
    {
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = State::all()->pluck('country', 'id')->prepend(trans('global.pleaseSelect'), '');

        $city->load('name');

        return view('admin.cities.edit', compact('names', 'city'));
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('admin.cities.index');
    }

    public function show(City $city)
    {
        abort_if(Gate::denies('city_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city->load('name');

        return view('admin.cities.show', compact('city'));
    }

    public function destroy(City $city)
    {
        abort_if(Gate::denies('city_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city->delete();

        return back();
    }

    public function massDestroy(MassDestroyCityRequest $request)
    {
        City::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
