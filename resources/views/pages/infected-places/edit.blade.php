@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ action('InfectedPlaceController@index') }}">
            <button class="btn btn-icon btn-sm btn-primary active" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>

                <span class="btn-inner--text">Go back</span>

            </button>

        </a>
    </div>
    <div>
        <div class="card-block p-4">
            <form action="{{ action('InfectedPlaceController@update',$infectedPlace->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    
                    <div class="col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('address_id') ? ' has-danger' : '' }}">
                            <label for="address_id">Address</label>
                            <select name="address_id" id="address_id" class="form-control">
                                <option>Select An Address</option>
                                @foreach($addresses as $address)
                                <option {{$address->id == $infectedPlace->address_id ? 'selected':''}}
                                    value="{{ $address->id }}">
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
                    <div class="col-sm-6 col-12">
                        <div class="form-group{{ $errors->has('infected_at') ? ' has-danger' : '' }}">
                            <label for="infected_at">Infected At</label>
                            <input type="text" name="infected_at" class="form-control flatpickr flatpickr-input" id="infected_at"
                                value="{{$infectedPlace->metadata['infected_at']}}" required>
                            @if ($errors->has('infected_at'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('infected_at') }}</strong>
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