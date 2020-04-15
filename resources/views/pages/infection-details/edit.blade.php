@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ action('InfectionDetailsController@index') }}">
            <button class="btn btn-icon btn-sm btn-primary active" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>

                <span class="btn-inner--text">Go back</span>

            </button>

        </a>
    </div>
    <div>
        <div class="card-block p-4">
            <form action="{{ action('InfectionDetailsController@update',$infectionDetails->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('infected_place_id') ? ' has-danger' : '' }}">
                            <label for="infected_place_id">Place</label>
                            <select name="infected_place_id" id="infected_place_id" class="form-control" required>
                                <option>Select A Place</option>
                                @foreach($infectedPlaces as $infectedPlace)
                                <option value="{{ $infectedPlace->id }}" {{ $infectionDetails->infected_place_id == $infectedPlace->id ? 'selected':'' }}>
                                    {{ $infectedPlace->address->name .' : '.$infectedPlace->address->municipality->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('infected_place_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('infected_place_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('infected_at') ? ' has-danger' : '' }}">
                            <label for="infected_at">Infected At</label>
                        <input type="text" name="infected_at" class="form-control flatpickr datetimepicker" value="{{$infectionDetails->infected_date}}"
                                id="infected_at" required>
                            @if ($errors->has('infected_at'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('infected_at') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" class="form-control" value="{{$infectionDetails->remarks ?? ''}}"
                                id="remarks" required>
                            @if ($errors->has('remarks'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('remarks') }}</strong>
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