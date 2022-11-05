<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StationController extends Controller
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
        $stations = Station::where("org_id", Auth::user()->org_id)->get();
        return view('pages.org.stations.list_stations', compact("stations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $supervisors = User::where('role_id', '=', 3)->get();
        // $managers = User::where('role_id', '=', 4)->get();

        // this is just for testing only:
        $managers = User::where(["org_id"=> Auth::user()->org_id, 'role_id'=>4])->get();
        // $managers = $supervisors;

        return view('pages.org.stations.add_station', compact('managers'));
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
            'location' => ['required'],
            'address' => ['nullable'],
            'contact' => ['nullable'],
            // 'no_of_clusters' => ['required'],
            // 'no_of_pos' => ['required'],
            // 'supervisor' => ['required'],
            'manager' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $station = Station::create([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'location' => $request->location,
            'address' => $request->address,
            'contact' => $request->contact,
            // 'no_of_clusters' => $request->no_of_clusters,
            // 'supervisor_id' => $request->supervisor,
            'manager_id' => $request->manager,
            // 'no_of_pos' => $request->no_of_pos,
        ]);

        if ($station) {
            return redirect()->route('show_station_info', ['id' => $station->id])->with('success', "station is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Station is not added, Try Again. Thank you!");
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
        $station = Station::find($id);

        // return $station;
        $managers = User::where(["org_id"=> Auth::user()->org_id, 'role_id'=>4])->get();

        $pending_supplies = Dispatch::where(['org_id'=>Auth::user()->org_id, 'station_id'=>$station->id, 'status'=>0])->get();
        
        return view('pages.org.stations.info_station', compact('station', 'managers', 'pending_supplies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);

        // $supervisors = User::where('role_id', '=', 3)->get();
        // $managers = User::where('role_id', '=', 4)->get();

        // this is just for testing only:
        $supervisors = User::where("org_id", Auth::user()->org_id)->get();
        $managers = $supervisors;

        return view('pages.org.stations.edit_station', compact('station', 'supervisors', 'managers'));
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
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'location' => ['required'],
            'address' => ['nullable'],
            'contact' => ['nullable'],
            // 'no_of_clusters' => ['required'],
            // 'no_of_pos' => ['required'],
            // 'supervisor' => ['required'],
            'manager' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $station = Station::where('id', '=', $id)->update([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'location' => $request->location,
            'address' => $request->address,
            'contact' => $request->contact,
            // 'no_of_clusters' => $request->no_of_clusters,
            // 'supervisor_id' => $request->supervisor,
            'manager_id' => $request->manager,
            // 'no_of_pos' => $request->no_of_pos,
        ]);

        if ($station) {
            return redirect()->route('show_station_info', ['id' => $id])->with('success', "station info is updated, check below to verify. Thank you!");
        } else {
            return back()->with('error', "Station is not added, Try Again. Thank you!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::where('id', '=', $id)->destroy();

        if ($station) {
            return redirect()->route('list_stations')->with('success', 'Station is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete station, Try again later.');
        }
    }

    /**
     * Activate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activation($id)
    {
        
        $station = Station::where('id', '=', $id)->get()[0];

        if ($station->active == 1) {
            $update = Station::where('id', '=', $id)->update([
                'active' => 0,
            ]);
            return 'Station has been Deactivated.';
            // return redirect()->route('list_stations')->with('error', 'Station has been Deactivated.');
        } else {
            $update = Station::where('id', '=', $id)->update([
                'active' => 1,
            ]);
            return 'Station is Activated.';
            // return back()->with('success', 'Station is Activated.');
        }
    }

    public function station_by_location(Request $request, $id)
    {
        if ($request->ajax()) {
            $output = "";

            $stations = Station::where(['org_id'=> Auth::user()->org_id, 'location'=>$request->data])->get();

            $data = $stations;
            // return $data;

            if (count($data) > 0) {
                $output .= '<option disabled selected>Select Station</option>';
                foreach ($data as $row) {
                    $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
                }
            } else {

                $output .= '<option selected disabled>No station at that location</option>';
            }


            return $output;
        }else{
            abort(404);
        }
    }
}
