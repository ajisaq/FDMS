<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\ClusterType;
use App\Models\Other;
use App\Models\Station;
use App\Models\Tank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClusterController extends Controller
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
        //
        $clusters = Cluster::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.clusters.list_cluster', compact('clusters'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_station_cluster($id)
    {
        //
        $clusters = Cluster::where(['org_id'=> Auth::user()->org_id, 'station_id' => $id])->get();

        return view('pages.org.clusters.list_cluster', compact('clusters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();

        $supervisors = User::where(['org_id'=> Auth::user()->org_id, 'role_id'=>3])->get();

        $cluster_types = ClusterType::where(['org_id'=> Auth::user()->org_id])->get();

        return view('pages.org.clusters.add_cluster', compact('stations', 'supervisors', 'cluster_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_station_cluster($id)
    { 

        $station = Station::where(['org_id' => Auth::user()->org_id, 'id' => $id])->get();
        $station = $station[0];

        $supervisors = User::where(['org_id'=> Auth::user()->org_id, 'role_id'=>3])->get();

        $cluster_types = ClusterType::where(['org_id'=> Auth::user()->org_id])->get();

        return view('pages.org.clusters.add_station_cluster', compact('station', 'supervisors', 'cluster_types'));
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
            'type' => ['required'],
            'tname' => ['array'],
            'station' => ['required'],           //Station Id
            'supervisor' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }
        
        $cluster = Cluster::create([
            'org_id' => Auth::user()->org_id,
            'cluster_type_id' => $request->name,
            'type' => $request->type,
            'station_id' => $request->station,
            'supervisor_id'=> $request->supervisor,
        ]);

        if($request->type == "tanks"){
            foreach ($request->tname as $t) {

                $sub_cluster = Tank::create([
                'org_id' => Auth::user()->org_id,
                'cluster_id' => $cluster->id,
                'name' => $t,
                ]);
            }
        }else{
            $sub_cluster = Other::create([
                'org_id' => Auth::user()->org_id,
                'cluster_id' => $cluster->id,
                'name' =>$request->name,
                ]);
        }


        if ($cluster) {
            return redirect()->route('show_cluster_info', ['id' => $cluster->id])->with('success', "Cluster is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Cluster is not added, Try Again. Thank you!");
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
        $cluster = Cluster::find($id);
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();

        $supervisors = User::where(['org_id' => Auth::user()->org_id, 'role_id'=>3])->get(); //supervisors

        $cluster_types = ClusterType::where(['org_id'=> Auth::user()->org_id])->get();

        return view('pages.org.clusters.info_cluster', compact('stations', 'cluster', 'supervisors', 'cluster_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cluster = Cluster::find($id);

        $station = $cluster->station;

        return view('pages.org.clusters.edit', compact('station', 'cluster'));
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
            'station' => ['required'],
            'tname' => ['nullable'],
            'supervisor' => ['nullable']
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }
        $c = Cluster::find($id);

        // return $request->all();

        $cluster = Cluster::where('id', '=', $id)->update([
            'org_id' => Auth::user()->org_id,
            'cluster_type_id' => $request->name,
            'station_id' => $request->station,
            'supervisor_id' => $request->supervisor,
        ]);

        if($c->type == "tanks"){
            if(!empty($request->tname)){
                foreach($request->tname as $t){
                    $tank = Tank::create([
                        'org_id' => Auth::user()->org_id,
                        'cluster_id' => $c->id,
                        'name' => $t,
                    ]);
                }
            }
        }

        if ($cluster) {
            return redirect()->route('show_cluster_info', ['id' => $id])->with('success', "Cluster is Updated, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Cluster is not updated, Try Again. Thank you!");
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
        $cluster = Cluster::where('id', '=', $id)->destroy();

        if ($cluster) {
            return redirect()->route('list_clusters')->with('success', 'cluster is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete cluster, Try again later.');
        }
    }

    public function cluster_by_station(Request $request, $id)
    {
        if ($request->ajax()) {
            $output = "";

            $clusters = cluster::where(['org_id'=> Auth::user()->org_id, 'station_id'=>$request->data])->get();

            $data = $clusters;

            if (count($data) > 0) {
                $output .= '<option disabled selected>Select Cluster</option>';
                foreach ($data as $row) {
                    $output .= '<option value="'.$row->id.'">'.$row->cluster_type->name.'</option>';
                }
            } else {

                $output .= '<option selected disabled>No product found in station</option>';
            }


            return $output;
        }else{
            abort(404);
        }
    }
}
