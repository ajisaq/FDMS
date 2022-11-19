<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
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
        $inventories = Inventory::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.inventory.list', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();
        $categories = Category::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.inventory.add', compact('stations', 'categories'));
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
            'unit' => ['required'],
            'amount' => ['required'],
            'station' => ['required'],
            'cluster' => ['required'],
            'category' => ['required'],
            'w_p_n' => ['required'],
            'w_q' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $inventory = Inventory::create([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'unit' => $request->unit,
            'amount' => $request->amount,
            'station_id' => $request->station,
            'cluster_id' => $request->cluster,
            'category_id' => $request->category,
            'with_quantity' =>$request->w_q,
            'with_payer_name' => $request->w_p_n,
        ]);

        if ($inventory) {
            return redirect()->route('list_inventories', ['id' => $request->station])->with('success', "Inventory is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Failed!, Inventory is not added, Try Again. Thank you!");
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
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();
        $categories = Category::where('org_id', '=', Auth::user()->org_id)->get();
        $inventory = Inventory::where(['org_id'=> Auth::user()->org_id, 'id'=>$id])->get()[0];

        return view('pages.org.inventory.info', compact('stations', 'categories', 'inventory'));
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
            'unit' => ['required'],
            'amount' => ['required'],
            // 'station' => ['required'],
            // 'cluster' => ['required'],
            'category' => ['required'],
            'w_p_n' => ['required'],
            'w_q' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $inventory = Inventory::where('id', $id)->update([
            // 'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'unit' => $request->unit,
            'amount' => $request->amount,
            // 'station_id' => $request->station,
            // 'cluster_id' => $request->cluster,
            'category_id' => $request->category,
            'with_quantity' =>$request->w_q,
            'with_payer_name' => $request->w_p_n,
        ]);

        if ($inventory) {
            return back()->with('success', "Inventory is updates, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Failed to update Inventory, Try Again. Thank you!");
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
        $inventory = Inventory::where('id', '=', $id)->delete();

        if ($inventory) {
            return back()->with('success', 'Product is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete product, Try again later.');
        }
    }

    public function station_inventories($id)
    {
        $station = Station::find($id);

         return view('pages.org.inventory.station_list', compact('station'));
    }


    public function inventory_by_station(Request $request, $id)
    {
        if ($request->ajax()) {
            $output = "";

            $inventories = Inventory::where(['org_id'=> Auth::user()->org_id, 'station_id'=>$request->data])->get();

            $data = $inventories;

            if (count($data) > 0) {
                foreach ($data as $row) {
                    $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
                }
            } else {

                $output .= '<option selected disabled>No product found in station</option>';
            }


                return $output;
            }
    }

    public function inventory_by_cluster(Request $request, $id)
    {
        if ($request->ajax()) {
            $output = "";

            $inventories = Inventory::where(['org_id'=> Auth::user()->org_id, 'cluster_id'=>$request->data])->get();

            $data = $inventories;

            if (count($data) > 0) {
                $output .= '<option disabled selected>Select Inventories</option>';
                foreach ($data as $row) {
                    $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
                }
            } else {

                $output .= '<option selected disabled>No product found in this cluster</option>';
            }


                return $output;
            }
    }
}
