@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ action('AddressController@index') }}">
            <button class="btn btn-icon btn-sm btn-primary active" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>

                <span class="btn-inner--text">Go back</span>

            </button>

        </a>
    </div>
    <div>
        <div class="card-block p-4">
            <form action="{{ action('AddressController@update',$address->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control text-capitalize" id="name" required
                                value="{{$address->name}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control text-capitalize" id="location"
                                value="{{$address->coordinates}}" required>
                            @if ($errors->has('location'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('province_id') ? ' has-danger' : '' }}">
                            <label for="province_id">Province</label>
                            <select name="province_id" id="province_id" class="form-control">
                                <option>Select A Province</option>
                                @foreach($provinces as $province)
                                <option {{$address->province_id == $province->id ? 'selected':''}}
                                    value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('province_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('province_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('zone_id') ? ' has-danger' : '' }}">
                            <label for="zone_id">Zone</label>
                            <select name="zone_id" id="zone_id" class="form-control">
                                <option>Select A Zone</option>
                                @foreach($zones as $zone)
                                <option {{$address->zone_id == $zone->id ? 'selected':''}} value="{{ $zone->id }}">
                                    {{ $zone->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('zone_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('zone_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('district_id') ? ' has-danger' : '' }}">
                            <label for="district_id">District</label>
                            <select name="district_id" id="district_id" class="form-control">
                                <option>Select A District</option>
                                @foreach($districts as $district)
                                <option {{$address->district_id == $district->id ? 'selected':''}}
                                    value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('district_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('district_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('municipality_id') ? ' has-danger' : '' }}">
                            <label for="municipality_id">Municipality</label>
                            <select name="municipality_id" id="municipality_id" class="form-control">
                                <option>Select A Municipality</option>
                                @foreach($municipalities as $municipality)
                                <option {{$address->municipality_id == $municipality->id ? 'selected':''}}
                                    value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('municipality_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('municipality_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('place_type_id') ? ' has-danger' : '' }}">
                            <label for="place_type_id">Place Type</label>
                            <select name="place_type_id" id="place_type_id" class="form-control">
                                <option>Select A Place Type</option>
                                @foreach($placeTypes as $place_type)
                                <option {{$address->place_type_id == $place_type->id ? 'selected':''}}
                                    value="{{ $place_type->id }}">{{ $place_type->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('place_type_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('place_type_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        <div class="form-group">
                            <button class="btn btn-primary">Update Entry</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection