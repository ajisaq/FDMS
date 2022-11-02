<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Pos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PosController extends Controller
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

        $pos = Pos::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.pos.list_pos', compact('pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clusters = Cluster::where('org_id', '=', Auth::user()->org_id)->get();

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
            'cluster' => ['required'],
            'sub_cluster' => ['nullable'],           //cluster Id
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $cluster = Cluster::find($request->cluster);

        if ($cluster->type == "tanks") {
            if (!empty($request->sub_cluster)) {
                # code...
                $sub_cluster = $request->sub_cluster;
            }else{
                return back()->with('error', 'Please select a sub cluster for the pos. Thank you!');
            }
        }else{
            $sub_cluster = $cluster->others;
            $sub_cluster = $sub_cluster[0]->id;
        }

        $pos = Pos::create([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'service_type' => $request->service_type,
            'cluster_id' => $request->cluster,
            'sub_cluster_id' => $sub_cluster,
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
        $clusters = Cluster::where('org_id', '=', Auth::user()->org_id)->get();

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
            // 'cluster' => ['required'],
            'sub_cluster' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        if(!empty($request->sub_cluster)){
            $pos = Pos::where('id', '=', $id)->update([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'service_type' => $request->service_type,
            // 'cluster_id' => $request->cluster,
            'sub_cluster_id' => $request->sub_cluster,
        ]);
        }else{
            $pos = Pos::where('id', '=', $id)->update([
                'org_id' => Auth::user()->org_id,
                'name' => $request->name,
                'service_type' => $request->service_type,
                // 'cluster_id' => $request->cluster,
            ]);
        }

        if ($pos) {
            return redirect()->route('show_pos_info', ['id' => $id])->with('success', "Pos is updated, check below info to verify. Thank you!");
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

    public function search_tank(Request $request)
    {
        if ($request->ajax()) {
            $output = "";

                $cluster = Cluster::find($request->data);

                if ($cluster->type == "tanks") {

                    $data = $cluster->tanks;

                    if (count($data) > 0) {
                        $output = '<ul class="list-group" style="display: block;">';
                        $i = 0;
                        foreach ($data as $row) {
    
                            $output .= '<li class="list-group-item"  onclick="' . "$('#load').css('display', 'block');" . '"><div class="form-check"><input class="form-check-input" type="radio" name="sub_cluster" value="'
                                . $row->id . '" id="flexCheckDefault[' . $i . ']"><label class="form-check-label" for="flexCheckDefault[' . $i . ']">'
                                . $row->name .
                                '</label></div></li>';
                            $i++;
                        }
                        $output .= '</ul>';
                    } else {
    
                        $output .= '<li class="list-group-item">' . 'No Customer' . '</li>';
                    }
                }else{
                    $output .= '<li class="list-group-item">' . 'No Sub Clusters' . '</li>';
                }


                return $output;
            }
    }
}
