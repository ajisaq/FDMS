<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
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
        $devices = Device::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.device.list_device', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.org.device.add_device', compact('stations'));
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
            'station' => ['required'],           //Station Id
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $rand_num = random_int(1000000000, 9999999999);

        $device = Device::create([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'station_id' => $request->station,
        ]);

        Device::where('id', '=', $device->id)->update([
            'mac_number' => $rand_num,
        ]);

        if ($device) {
            return redirect()->route('show_device_info', ['id' => $device->id])->with('success', "Device is created, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Device is not added, Try Again. Thank you!");
        }
    }
    
    public function reset_device(Device $device)
    {
        $rand_um = random_int(1000000000, 9999999999);

        $up = Device::where('id', '=', $device->id)->update([
            'mac_number' => $rand_um,
        ]);
        if ($up) {
            # code...
            return back()->with('success', 'The ' . $device->name . ' Device key reset is successful');
        }else{
            return back()->with('error', 'Failed, Try Again.');
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
        $device = Device::find($id);
        $stations = Station::where('org_id', '=', Auth::user()->org_id)->get();

        // return $device;
        return view('pages.org.device.info_device', compact('stations', 'device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);

        $station = $device->station;

        return view('pages.org.device.edit_device', compact('station', 'device'));
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
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $device = Device::where('id', '=', $id)->update([ 
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'station_id' => $request->station,
        ]);

        if ($device) {
            return redirect()->route('show_device_info', ['id' => $id])->with('success', "device is updated, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "device is not Updated, Try Again. Thank you!");
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
        $device = Device::where('id', '=', $id)->delete();

        if ($device) {
            return redirect()->route('list_devices')->with('success', 'device is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete device, Try again later.');
        }
    }
}
