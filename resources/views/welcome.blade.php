@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to COVID-19 Tracker</h2>
    <h4>This platform tracks the infected people, their locations and recently visited places, which helps us to analyze
        its spread and control.</h4>
    <ul>
        <li>Find safe way around you!</li>
        <li>See the list of highly infected places</li>
        <li>Safe Places ATM</li>
        <li>Unsafe/Infected Places</li>
        <li>Vulnerable Places</li>
        <li>Vulnerability Test</li>
    </ul>

    <h2 class="text-center">We Recommend You To:
        <br><br>
        <button class="btn btn-lg btn-danger">
            <strong>Take Vulnerability Test</strong>
        </button>
    </h2>

    <div class="card" style="width: 18rem;">
        <div class="card-header">
            Actions
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{ action('AddressController@index') }}">Add Address</a>
            </li>
            <li class="list-group-item">
                <a href="{{ action('InfectedPlaceController@index') }}">Add Infected Place</a>
            </li>
            <li class="list-group-item">
                <a href="{{ action('RecentlyVisitedLocationController@index') }}">Add Recently Visited Locations</a>
            </li>
            <li class="list-group-item">
                <a href="{{ action('InfectionDetailsController@index') }}">Add Patient Info</a>
            </li>
            <li class="list-group-item">
                <a href="{{ action('PlaceTypeController@index') }}">Add Place Type</a>
            </li>
        </ul>
    </div>
</div>
@endsection