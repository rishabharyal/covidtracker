@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ action('PlaceTypeController@index') }}">
            <button class="btn btn-icon btn-sm btn-primary active" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>

                <span class="btn-inner--text">Go back</span>

            </button>

        </a>
    </div>
    <div>
        <div class="card-block p-4">
            <form action="{{ action('PlaceTypeController@update',$placeType->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    
                    <div class="col-sm-12 col-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$placeType->name}}"
                                id="name" required>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
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