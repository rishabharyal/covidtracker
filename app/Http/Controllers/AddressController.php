<?php

namespace App\Http\Controllers;

use App\Address;
use App\District;
use App\Municipality;
use App\PlaceType;
use App\Province;
use App\Zone;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();
        $provinces = Province::all();
        $zones = Zone::all();
        $districts = District::all();
        $placeTypes = PlaceType::all();
        $municipalities = Municipality::all();

        return view("pages.addresses.index", compact('addresses', 'zones', 'provinces', 'districts', 'placeTypes', 'municipalities'));
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
            'name' => 'required|unique:addresses,name',
            'province_id' => 'sometimes|nullable|exists:provinces,id',
            'zone_id' => 'sometimes|nullable|exists:zones,id',
            'district_id' => 'sometimes|nullable|exists:districts,id',
            'municipality_id' => 'sometimes|nullable|exists:municipalities,id',
            'place_type_id' => 'sometimes|nullable|exists:place_types,id',
        ]);

        $p = new Address();
        $p->name = $request->get('name');
        $p->coordinates = ($request->get('lat') && $request->get('lng')) ? $request->get('lat') . ',' . $request->get('lng') : ' , ';
        $p->province_id = $request->get('province_id') ?? null;
        $p->zone_id = $request->get('zone_id') ?? null;
        $p->district_id = $request->get('district_id') ?? null;
        $p->municipality_id = $request->get('municipality_id') ?? null;
        $p->place_type_id = $request->get('place_type_id') ?? null;
        $p->save();

        return redirect()->back()->with('success', 'Address Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        if (!$address) {
            return redirect()->back()->with('error', 'The requested address does not exist!');
        }

        $provinces = Province::all();
        $zones = Zone::all();
        $districts = District::all();
        $placeTypes = PlaceType::all();
        $municipalities = Municipality::all();

        return view("pages.addresses.edit", compact('address', 'zones', 'provinces', 'districts', 'placeTypes', 'municipalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $this->validate($request, [
            'name' => 'required|unique:addresses,name,' . $address->id,
            'province_id' => 'sometimes|nullable|exists:provinces,id',
            'zone_id' => 'sometimes|nullable|exists:zones,id',
            'district_id' => 'sometimes|nullable|exists:districts,id',
            'municipality_id' => 'sometimes|nullable|exists:municipalities,id',
            'place_type_id' => 'sometimes|nullable|exists:place_types,id',
        ]);

        $address->name = $request->get('name');
        $address->coordinates = $request->get('lat') ?? '' . ',' . $request->get('lng') ?? '';
        $address->province_id = $request->get('province_id') ?? null;
        $address->zone_id = $request->get('zone_id') ?? null;
        $address->district_id = $request->get('district_id') ?? null;
        $address->municipality_id = $request->get('municipality_id') ?? null;
        $address->place_type_id = $request->get('place_type_id') ?? null;
        $address->save();

        return redirect()->action('AddressController@index')->with('success', 'Address Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        if (!$address) {
            return redirect()->back()->with('error', 'The requested address does not exist!');
        }

        $address->delete();
        return redirect()->back()->with('error', 'The requested Address has been Deleted Successfully');
    }
}
