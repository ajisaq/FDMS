<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clusters = Cluster::all();

        return view('pages.org.clusters.list', compact('clusters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();

        return view('pages.org.clusters.add_cluster', compact('stations'));
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
            'description' => ['required'],
            'station' => ['required'],           //Station Id
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $cluster = Cluster::create([
            'name' => $request->name,
            'description' => $request->description,
            'station_id' => $request->station,
        ]);

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

        return $cluster;
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
            'description' => ['required'],
            'station' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $cluster = Cluster::where('id', '=', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'station_id' => $request->station,
        ]);

        if ($cluster) {
            return redirect()->route('show_cluster_info', ['id' => $cluster->id])->with('success', "Cluster is Updated, check below info to verify. Thank you!");
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
            return redirect()->route('list_stations')->with('success', 'cluster is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete cluster, Try again later.');
        }
    }
}
