<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Pos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pos = Pos::all();

        return view('pages.org.pos.list_pos', compact('pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clusters = Cluster::all();

        return view('pages.org.pos.add_pos', compact('clusters'));
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
            'service_type' => ['required'],
            'description' => ['required'],
            'cluster' => ['required'],           //cluster Id
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $pos = Pos::create([
            'name' => $request->name,
            'service_type' => $request->service_type,
            'description' => $request->description,
            'cluster_id' => $request->cluster,
        ]);

        if ($pos) {
            return redirect()->route('show_pos_info', ['id' => $pos->id])->with('success', "Pos is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Pos is not added, Try Again. Thank you!");
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
        $pos = Pos::find($id);
        $clusters = Cluster::all();

        // return $pos;
        return view('pages.org.pos.info_pos', compact('clusters', 'pos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pos = Pos::find($id);

        $cluster = $pos->cluster;

        return view('pages.org.pos.edit_pos', compact('pos', 'cluster'));
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
            'service_type' => ['required'],
            'description' => ['required'],
            'cluster' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $pos = Pos::where('id', '=', $id)->update([
            'name' => $request->name,
            'service_type' => $request->service_type,
            'description' => $request->description,
            'cluster_id' => $request->cluster,
        ]);

        if ($pos) {
            return redirect()->route('show_pos_info', ['id' => $pos->id])->with('success', "Pos is updated, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Pos is not updated, Try Again. Thank you!");
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
        $pos = Pos::where('id', '=', $id)->destroy();

        if ($pos) {
            return redirect()->route('list_pos')->with('success', 'Pos is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete Pos, Try again later.');
        }
    }
}
