@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ action('RecentlyVisitedLocationController@index') }}">
            <button class="btn btn-icon btn-sm btn-primary active" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>

                <span class="btn-inner--text">Go back</span>

            </button>

        </a>
    </div>
    <div>
        <div class="card-block p-4">
            <form action="{{ action('RecentlyVisitedLocationController@update',$recentlyVisitedLocation->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('address_id') ? ' has-danger' : '' }}">
                            <label for="address_id">Address</label>
                            <select name="address_id" id="address_id" class="form-control">
                                <option>Select An Address</option>
                                @foreach($addresses as $address)
                                <option {{ $address->id == $recentlyVisitedLocation->address_id ? 'selected' : '' }} value="{{ $address->id }}">
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
                        <input type="text" name="start_time" class="form-control flatpickr datetimepicker" id="start_time" value="{{$recentlyVisitedLocation->start_time}}"
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
                            <input type="text" name="end_time" class="form-control flatpickr datetimepicker" id="end_time"  value="{{$recentlyVisitedLocation->end_time}}"
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
                            <button class="btn btn-primary">Update Entry</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection