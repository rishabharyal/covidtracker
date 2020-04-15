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
            <form action="{{ action('InfectionDetailsController@store') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-sm-4 col-12">
                        <div class="form-group{{ $errors->has('infected_place_id') ? ' has-danger' : '' }}">
                            <label for="infected_place_id">Place</label>
                            <select name="infected_place_id" id="infected_place_id" class="form-control" required>
                                <option>Select A Place</option>
                                @foreach($infectedPlaces as $infectedPlace)
                                <option value="{{ $infectedPlace->id }}">
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
                            <input type="text" name="infected_at" class="form-control flatpickr datetimepicker"
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
                            <input type="text" name="remarks" class="form-control"
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
                    <th>User Name</th>
                    <th>Place</th>
                    <th>Infected At</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($infectionsDetails as $key=>$detail)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $detail->user ? $detail->user->name  : ''}}</td>
                    <td>{{ $detail->infectedPlace->address->name}}</td>
                    <td>{{ $detail->infected_date ?? ''}}</td>
                    <td>{{$detail->remarks}}</td>
                    <td>
                        <form action="{{ action('InfectionDetailsController@destroy', $detail->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm"
                                href="{{ action('InfectionDetailsController@edit', $detail->id) }}">
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