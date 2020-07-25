@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cities.update", [$city->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name_id">{{ trans('cruds.city.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name_id" id="name_id" required>
                    @foreach($names as $id => $name)
                        <option value="{{ $id }}" {{ ($city->name ? $city->name->id : old('name_id')) == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.city.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="number" name="state" id="state" value="{{ old('state', $city->state) }}" step="1">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection