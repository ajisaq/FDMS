<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\DispatchCompany;
use App\Models\Inventory;
use App\Models\OrgLocation;
use App\Models\Station;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DispatchController extends Controller
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
        $p_dispatches = Dispatch::where(['org_id'=>Auth::user()->org_id, 'status'=>0])->get();
        $a_dispatches = Dispatch::where(['org_id'=>Auth::user()->org_id, 'status'=>1])->get();
        
        return view('pages.org.dispatch.list', compact('p_dispatches', 'a_dispatches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();
        $d_companies = DispatchCompany::where('org_id', '=', Auth::user()->org_id)->get();
        $locations = OrgLocation::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.dispatch.add', compact('stations', 'd_companies', 'locations'));
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
            'dispatcher_name' => ['required'],
            'inventory' => ['required'],
            'quantity_dispatched' => ['required'],
            'v_plate_number' => ['nullable'],
            'dispatch_company' => ['required'],
            'station' => ['required'],
            'dispatch_time' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // generate random ref ID
        $org_name = Auth::user()->org->name;
        $f_l = substr($org_name, 0,1)."".substr($org_name, -1);
        $random = rand(10000, 99999);
        $ref = $f_l.$random;

        $dispatch = Dispatch::create([
            'org_id' => Auth::user()->org->id,
            'dispatcher_name' => $request->dispatcher_name,
            'inventory_id' => $request->inventory,
            'quantity_dispatched' => $request->quantity_dispatched,
            'v_plate_number' => $request->v_plate_number,
            'd_company_id' => $request->dispatch_company,
            'ref_id' => $ref,
            'station_id' => $request->station,
            'dispatch_time' => $request->dispatch_time, 
            'status' => '0',
        ]);

        if ($dispatch) {
            return redirect()->route('supplies')->with('success', "You have added a supply dispatch from ".$request->dispatch_company.". Thank you!");
        }else{
            return back()->with('error', "Failed, Try Again. Thank you!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supply = Dispatch::where(['org_id'=>Auth::user()->org_id, 'id'=>$id, 'status'=>0])->get()[0];

        if ($supply) {
            # code...
            return view('pages.org.dispatch.update', compact('supply'));
        }else{
            return back()->with('error', 'Supply was already been confirmed by the station manager');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity_recieved' => ['required'],
            'remark' => ['nullable'],
            'arival_time' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $update = Dispatch::where(['org_id'=>Auth::user()->org_id, 'id'=>$id])->update([
            'quantity_recieved' => $request->quantity_recieved,
            'remark' => $request->remark,
            'arival_time' => $request->arival_time,
            'manager_id' => Auth::User()->id,
            'status' => '1',
        ]);

        $sup = Dispatch::find($id);

        if ($update) {

            $stock = Stock::where(['inventory_id'=>$sup->inventory_id])->get();

            if (count($stock)>0) {
                $sq = $stock[0]->quantity+$request->quantity_recieved;

                $ss = Stock::where(['id'=>$stock[0]->id])->update([
                    'quantity'=>$sq,
                ]);
            }else{
                $ss = Stock::create([
                    "org_id"=>Auth::user()->org->id,
                    "inventory_id"=>$sup->inventory_id,
                    "quantity"=>$request->quantity_recieved,
                    "status"=>"Stocked",
                    "expiry_date"=>date("Y-m-d", strtotime("+10 week")),
                ]);
            }
            return redirect()->route('show_station_info', ['id'=>$sup->station->id])->with('success', "You have successfully confirm your supply delivery from ".$sup->dispatch_company.". Thank you!");
        }else{
            return back()->with('error', "Failed, Try Again. Thank you!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispatch = Dispatch::where(['org_id'=> Auth::user()->org_id, 'id'=> $id])->delete();

        if ($dispatch) {
            return redirect()->route('list_cluster_types')->with('success', 'Dispatch is deleted.');
        } else {
            return back()->with('error', 'Failed to delete dispatch, Try again later.');
        }
    }

    
}
