<?php

namespace App\Http\Controllers;

use App\Address;
use App\InfectedPlace;
use App\InfectionDetails;
use Illuminate\Http\Request;

class InfectedPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infectedPlaces = InfectedPlace::all();
        $addresses = Address::all();

        return view("pages.infected-places.index", compact('infectedPlaces', 'addresses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address_id' => 'required|exists:addresses,id|unique:infected_places,address_id',
            'infected_at' => 'sometimes|nullable|date',
        ]);

        $infectedPlace = new InfectedPlace();
        $infectedPlace->address_id = $request->get('address_id');
        $metadata = [
            'infected_at' => $request->get('infected_at') ?? null,
        ];
        $infectedPlace->metadata = json_encode($metadata);
        $infectedPlace->save();

        // $infectionDetail = new InfectionDetails();
        // $infectionDetail->place_id = $infectedPlace->id;
        // $infectionDetail->place_id = $infectedPlace->id;

        return redirect()->back()->with('success', 'Entry Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfectedPlace  $infectedPlace
     * @return \Illuminate\Http\Response
     */
    public function show(InfectedPlace $infectedPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfectedPlace  $infectedPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(InfectedPlace $infectedPlace)
    {
        if (!$infectedPlace) {
            return redirect()->back()->with('error', 'The requested Place does not exist!');
        }
        $addresses = Address::all();

        return view("pages.infected-places.edit", compact('addresses', 'infectedPlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfectedPlace  $infectedPlace
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, InfectedPlace $infectedPlace)
    {
        $this->validate($request, [
            'address_id' => 'required|exists:addresses,id|unique:infected_places,address_id,' . $infectedPlace->id,
            'infected_at' => 'sometimes|nullable|date',
        ]);

        $infectedPlace->address_id = $request->get('address_id');
        $metadata = [
            'infected_at' => $request->get('infected_at') ?? null,
        ];
        $infectedPlace->metadata = json_encode($metadata);
        $infectedPlace->save();

        return redirect()->action('InfectedPlaceController@index')->with('success', 'Place Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfectedPlace  $infectedPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfectedPlace $infectedPlace)
    {
        if (!$infectedPlace) {
            return redirect()->back()->with('error', 'The requested Place does not exist!');
        }

        $infectedPlace->delete();
        return redirect()->back()->with('error', 'The requested Place has been Deleted Successfully');
    }
}
