<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\OrgLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = OrgLocation::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.locations.info', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();

        return view('pages.org.locations.add', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);


        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $location = OrgLocation::create([
            'org_id' => Auth::user()->org_id,
            'location_id' => $request->name,
        ]);

        if ($location) {
            return redirect()->route('list_locations', ['id' => $location->id])->with('success', "location is added, check below table to verify. Thank you!");
        
        } else {
            return back()->with('error', "Location is not added to organization, Try Again. Thank you!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = OrgLocation::destroy($id);

        if ($location) {
            return back()->with("success", 'Location is removed.');
        }else{
            return back()->with("error", 'Failed to remove location, Try again later.');
        }
    }
}
