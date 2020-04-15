<?php

namespace App\Http\Controllers;

use App\Address;
use App\RecentlyVisitedLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentlyVisitedLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitedLocations = RecentlyVisitedLocation::all();
        $addresses = Address::all();

        return view('pages.recently-visited-locations.index', compact('visitedLocations', 'addresses'));
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
            'address_id' => 'required|exists:addresses,id',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $visitedLocation = new RecentlyVisitedLocation();
        $visitedLocation->user_id = Auth::id() ?? null;
        $visitedLocation->address_id = $request->get('address_id');
        $visitedLocation->start_time = $request->get('start_time');
        $visitedLocation->end_time = $request->get('end_time');
        $visitedLocation->save();

        return redirect()->back()->with('success', 'The Location has been Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecentlyVisitedLocation  $recentlyVisitedLocation
     * @return \Illuminate\Http\Response
     */
    public function show(RecentlyVisitedLocation $recentlyVisitedLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecentlyVisitedLocation  $recentlyVisitedLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(RecentlyVisitedLocation $recentlyVisitedLocation)
    {
        if (!$recentlyVisitedLocation) {
            return redirect()->back()->with('error', 'The requested Location does not exist!')->withInput();
        }

        $addresses = Address::all();
        return view('pages.recently-visited-locations.edit', compact('recentlyVisitedLocation', 'addresses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecentlyVisitedLocation  $recentlyVisitedLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecentlyVisitedLocation $recentlyVisitedLocation)
    {
        $this->validate($request, [
            'address_id' => 'required|exists:addresses,id',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $recentlyVisitedLocation->user_id = Auth::id() ?? null;
        $recentlyVisitedLocation->address_id = $request->get('address_id');
        $recentlyVisitedLocation->start_time = $request->get('start_time');
        $recentlyVisitedLocation->end_time = $request->get('end_time');
        $recentlyVisitedLocation->save();

        return redirect()->action('RecentlyVisitedLocation@index')->with('success', 'The Location has been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecentlyVisitedLocation  $recentlyVisitedLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecentlyVisitedLocation $recentlyVisitedLocation)
    {
        if (!$recentlyVisitedLocation) {
            return redirect()->back()->with('error', 'The requested Location does not exist!')->withInput();
        }
        $recentlyVisitedLocation->delete();

        return redirect()->back()->with('success', 'The Location has been Deleted Successfully!');
    }
}
