<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Station;
use Illuminate\Http\Request;
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
        $inventories = Inventory::all();

        return view('pages.org.inventory.list', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $station = Station::all();
        $categories = Category::all();

        return view('pages.org.inventory.add', compact('station', 'categories'));
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
            'category' => ['required'],
            'w_p_n' => ['required'],
            'w_q' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $inventory = Inventory::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'amount' => $request->amount,
            'station_id' => $request->station,
            'category_id' => $request->category,
            'with_quantity' =>$request->w_q,
            'with_payer_name' => $request->w_p_n,
        ]);

        if ($inventory) {
            return redirect()->route('show_station_info', ['id' => $request->station])->with('success', "Inventory is added, check below info to verify. Thank you!");
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
        //
    }

    public function station_inventories($id)
    {
        $station = Station::find($id);

         return view('pages.org.inventory.station_list', compact('station'));
    }
}
