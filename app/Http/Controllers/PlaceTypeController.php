<?php

namespace App\Http\Controllers;

use App\PlaceType;
use Illuminate\Http\Request;

class PlaceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placeTypes = PlaceType::all();

        return view('pages.place-types.index', compact('placeTypes'));
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
            'name' => 'required',
        ]);

        $placeType = new PlaceType();
        $placeType->name = $request->get('name');
        $placeType->metadata = json_encode([]);

        $placeType->save();

        return redirect()->back()->with('success', 'The Place Type has been Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlaceType  $placeType
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceType $placeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlaceType  $placeType
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaceType $placeType)
    {
        return view('pages.place-types.edit', compact('placeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlaceType  $placeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaceType $placeType)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $placeType->name = $request->get('name');
        $placeType->metadata = json_encode([]);

        $placeType->save();

        return redirect()->action('PlaceTypeController@index')->with('success', 'The Place Type has been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlaceType  $placeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaceType $placeType)
    {
        if (!$placeType) {
            return redirect()->back()->with('error', 'The requested Place Type does not exist!');
        }

        $placeType->delete();
        return redirect()->back()->with('error', 'The requested Place Type has been Deleted Successfully');
    }
}
