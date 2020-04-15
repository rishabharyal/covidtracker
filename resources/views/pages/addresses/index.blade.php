@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <a href="{{ action('StaffController@dashboard') }}">
        <button class="btn btn-icon btn-sm btn-success active" type="button">
            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>

            <span class="btn-inner--text">Go back</span>

        </button>

        </a> --}}
        <a data-toggle="collapse" href="#add-entry" aria-expanded="true" aria-controls="test-block">
            <button class="btn btn-icon btn-sm btn-primary active" type="button">
                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>

                <span class="btn-inner--text">Create A New Entry</span>

            </button>
        </a>
    </div>
    <div id="add-entry" class="collapse {{$errors->isEmpty() ? '':'show'}}">
        <div class="card-block p-4">
            <form action="{{ action('AddressController@store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control text-capitalize" id="name" required
                                >
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('lat') ? ' has-danger' : '' }}">
                            <label for="lat">Latitude</label>
                            <input type="text" name="lat" class="form-control text-capitalize" id="lat"
                                >
                            @if ($errors->has('lat'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lat') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('lng') ? ' has-danger' : '' }}">
                            <label for="lng">Longitude</label>
                            <input type="text" name="lng" class="form-control text-capitalize" id="lng"
                                >
                            @if ($errors->has('lng'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lng') }}</strong>
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
                            <option value="{{$province->id}}"
                                   >{{ $province->name }}</option>
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
                                <option value="{{ $zone->id }}">
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
                                <option 
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
                                <option 
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
                                <option
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
                            <button class="btn btn-primary">Add Entry</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead">
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Coordinates</th>
                    <th>Province</th>
                    <th>Zone</th>
                    <th>District</th>
                    <th>Municipality</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($addresses as $key=>$address)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$address->name}}</td>
                    <td>{{'lat: '.explode(',',$address->coordinates)[0] .' lng: '.explode(',',$address->coordinates)[1]}}</td>
                    <td>{{$address->province ? $address->province->name : 'N/A'}}</td>
                    <td>{{$address->zone ? $address->zone->name : 'N/A'}}</td>
                    <td>{{$address->district ? $address->district->name : 'N/A'}}</td>
                    <td>{{$address->municipality ? $address->municipality->name : 'N/A'}}</td>
                    <td>{{$address->placeType ? $address->placeType->name : 'N/A'}}</td>
                    
                    <td>
                        <form action="{{ action('AddressController@destroy', $address->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm"
                                href="{{ action('AddressController@edit', $address->id) }}">
                                Edit
                            </a>
                            <button class="btn btn-sm btn-danger">
                                <span class="fas fa-trash-alt"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection