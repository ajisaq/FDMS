<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Dispatch;
use App\Models\OCCluster;
use App\Models\OCStation;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StationDashboardController extends Controller
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
        $station = Station::where(["org_id"=> Auth::user()->org_id, 'manager_id'=>Auth::user()->id])->get();
        if (count($station) > 0) {
            # code...
            $station = $station[0];
            $pending_supplies = Dispatch::where(['org_id'=>Auth::user()->org_id, 'station_id'=>$station->id, 'status'=>0])->get();

            $ocstations = OCStation::where(['station_id'=> $station->id])->get();
            $ocstation = OCStation::where(['station_id'=> $station->id])->latest()->first();

            return view('pages.station.index', compact("station", "pending_supplies", "ocstations", "ocstation"));
        }else{
            return back()->with('error', 'Station is not found');
        }
    }

    public function open_station(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'time' => ['required'],
            'cluster' => ['required'],
            'sub_cluster' => ['required'],
            'meter_r' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $time = str_replace("T", " ", $request->time);
        $time = explode(".", str_replace("Z", "", $time));
        $time = $time[0];

        $station = Station::find($id);

        $ocstation = OCStation::where(['station_id'=> $station->id])->latest()->first();

        $create_ocstation = OCStation::create([
            'action' => "1",
            'station_id' => $station->id,
            'time' => $time,
        ]);

        if ($create_ocstation) {
            foreach ($request->cluster as $key => $c) {
                $cluster = Cluster::find($c);
    
                foreach ($request->sub_cluster[$c] as $k => $sc) {
                    $create_occluster = OCCluster::create([
                        'action' => 1,
                        'o_c_station_id' => $create_ocstation->id,
                        'cluster_id' => $cluster->id,
                        'c_sub_id' => $sc,
                        'm_reading'=> $request->meter_r[$c][$sc],
                        'time'=>$time,
                    ]);
                }
    
            }
        }

        return back()->with('success', "Station is opened");
    }


    // closing of station
    public function close_station(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'time' => ['required'],
            'cluster' => ['required'],
            'sub_cluster' => ['required'],
            'meter_r' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $time = str_replace("T", " ", $request->time);
        $time = explode(".", str_replace("Z", "", $time));
        $time = $time[0];

        $station = Station::find($id);

        $ocstation = OCStation::where(['station_id'=> $station->id])->latest()->first();

        $create_ocstation = OCStation::create([
            'action' => "0",
            'station_id' => $station->id,
            'time' => $time,
        ]);

        if ($create_ocstation) {
            foreach ($request->cluster as $key => $c) {
                $cluster = Cluster::find($c);
    
                foreach ($request->sub_cluster[$c] as $k => $sc) {
                    $create_occluster = OCCluster::create([
                        'action' => 0,
                        'o_c_station_id' => $create_ocstation->id,
                        'cluster_id' => $cluster->id,
                        'c_sub_id' => $sc,
                        'm_reading'=> $request->meter_r[$c][$sc],
                        'time'=>$time,
                    ]);
                }
    
            }
        }

        return back()->with('success', "Station is Closed");
    }
}
