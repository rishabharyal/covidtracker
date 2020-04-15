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
            <form action="{{ action('RecentlyVisitedLocationController@store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('address_id') ? ' has-danger' : '' }}">
                            <label for="address_id">Address</label>
                            <select name="address_id" id="address_id" class="form-control">
                                <option>Select An Address</option>
                                @foreach($addresses as $address)
                                <option value="{{ $address->id }}">
                                    {{ $address->name .' : '.$address->municipality->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('address_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('start_time') ? ' has-danger' : '' }}">
                            <label for="start_time">Start Time (approx)</label>
                            <input type="text" name="start_time" class="form-control flatpickr datetimepicker" id="start_time"
                                autocomplete="off" required>
                            @if ($errors->has('start_time'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('start_time') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('end_time') ? ' has-danger' : '' }}">
                            <label for="end_time">End Time (approx)</label>
                            <input type="text" name="end_time" class="form-control flatpickr datetimepicker" id="end_time"
                                autocomplete="off" required>
                            @if ($errors->has('end_time'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('end_time') }}</strong>
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
                    <th>Address</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitedLocations as $key=>$location)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $location->address->name }}</td>
                    <td>{{ $location->start_time}}</td>
                    <td>{{ $location->end_time}}</td>
                    <td>
                        <form action="{{ action('RecentlyVisitedLocationController@destroy', $location->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm"
                                href="{{ action('RecentlyVisitedLocationController@edit', $location->id) }}">
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