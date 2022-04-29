<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();

        return view('pages.org.devices.list', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();

        return view('pages.org.devices.add', compact('stations'));
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

        $device = Device::create([
            'name' => $request->name,
            'station_id' => $request->station,
        ]);

        if ($device) {
            return redirect()->route('show_device_info', ['id' => $device->id])->with('success', "Device is created, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Device is not added, Try Again. Thank you!");
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

        return $device;
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

        return view('pages.org.devices.edit', compact('station', 'device'));
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
            'station' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $device = Device::where('id', '=', $id)->update([
            'name' => $request->name,
            'station_id' => $request->station,
        ]);

        if ($device) {
            return redirect()->route('show_cluster_info', ['id' => $device->id])->with('success', "device is updated, check below info to verify. Thank you!");
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
        $device = Device::where('id', '=', $id)->destroy();

        if ($device) {
            return redirect()->route('list_devices')->with('success', 'device is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete device, Try again later.');
        }
    }
}
