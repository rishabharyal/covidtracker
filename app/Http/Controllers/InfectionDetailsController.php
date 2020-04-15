<?php

namespace App\Http\Controllers;

use App\InfectedPlace;
use App\InfectionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfectionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infectionsDetails = InfectionDetails::all();
        $infectedPlaces = InfectedPlace::all();

        return view('pages.infection-details.index', compact('infectionsDetails', 'infectedPlaces'));
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
            'infected_place_id' => 'required|exists:infected_places,id',
            'infected_at' => 'required|date',
            'remarks' => 'required'
        ]);

        $infectionDetails->infected_place_id = $request->get('infected_place_id');
        $infectionDetails->infected_date = $request->get('infected_at');
        $infectionDetails->remarks = $request->get('remarks');
        $infectionDetails->user_id = Auth::id() ?? null;
        $infectionDetails->save();

        return redirect()->back()->with('success', 'Infection Detail Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfectionDetails  $infectionDetails
     * @return \Illuminate\Http\Response
     */
    public function show(InfectionDetails $infectionDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfectionDetails  $infectionDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infectionDetails = InfectionDetails::findOrFail($id);
        $infectedPlaces = InfectedPlace::all();

        return view('pages.infection-details.edit', compact('infectionDetails', 'infectedPlaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfectionDetails  $infectionDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'infected_place_id' => 'required|exists:infected_places,id',
            'infected_at' => 'required|date',
            'remarks' => 'required'
        ]);

        $infectionDetails = InfectionDetails::findOrFail($id);
        $infectionDetails->infected_place_id = $request->get('infected_place_id');
        $infectionDetails->infected_date = $request->get('infected_at');
        $infectionDetails->remarks = $request->get('remarks');
        $infectionDetails->user_id = Auth::id() ?? null;
        $infectionDetails->save();

        return redirect()->back()->with('success', 'Infection Detail Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfectionDetails  $infectionDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infectionDetails = InfectionDetails::findOrFail($id);
        $infectionDetails->delete();
        return redirect()->back()->with('error', 'The requested Detail has been Deleted Successfully');
    }
}
