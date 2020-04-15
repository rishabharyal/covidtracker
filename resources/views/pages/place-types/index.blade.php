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
            <form action="{{ action('PlaceTypeController@store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control"
                                id="name" required>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($placeTypes as $key=>$place)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $place->name }}</td>
                    <td>
                        <form action="{{ action('PlaceTypeController@destroy', $place->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm"
                                href="{{ action('PlaceTypeController@edit', $place->id) }}">
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