<?php

namespace App\Http\Controllers;

use App\Models\ClusterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClusterTypeController extends Controller
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
        $cluster_types = ClusterType::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.cluster_types.list', compact('cluster_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.org.cluster_types.add');
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

        $cluster_type = ClusterType::create([
            'name' => $request->name,
            'org_id' => Auth::user()->org->id,
        ]);

        if ($cluster_type) {
            return redirect()->route('list_cluster_types')->with('success', "Cluster Type is added. Thank you!");
        }else{
            return back()->with('error', "Cluster Type is not added, Try Again. Thank you!");
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
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $cluster_type = ClusterType::where('id', '=', $id)->update([
            'name' => $request->name,
            // 'org_id' => Auth::user()->org->id,
        ]);

        if ($cluster_type) {
            return redirect()->route('list_cluster_types')->with('success', "Cluster Type is Updated. Thank you!");
        }else{
            return back()->with('error', "Failed to update cluster type, Try Again. Thank you!");
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
        $cluster_type = ClusterType::where('id', '=', $id)->destroy();

        if ($cluster_type) {
            return redirect()->route('list_cluster_types')->with('success', 'cluster type is deleted successfuly.');
        } else {
            return back()->with('error', 'Failed to delete cluster type, Try again later.');
        }
    }
}
