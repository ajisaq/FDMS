<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Category;
use App\Models\Device;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    public function update_code(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_user' => 'required',
            'api_key' => 'required',
            'device_id' => 'required',
            'device_code' => ['required', 'max:255'],
        ]);

        if ($validator->fails()) {
            $res = [
                'status' => false,
                'data' => $validator->errors(),
            ];
            return response()->json($res);
        }

        $api = Api::where('api_user', '=', $request->api_user)->get();
        if (count($api) > 0) {
            if ($api[0]->api_key == $request->api_key) {
                $d = Device::where('mac_number', '=', $request->device_id)->get();

                $d_u = Device::where('mac_number', '=', $request->device_id)->update([
                    'mac_number' => $request->device_code
                ]);

                if ($d_u) {

                    $device = Device::where('id', '=', $d[0]->id)->with('org')->with('station')->get();

                    $org_cat = Category::where('org_id', '=', $device[0]->org_id)->get();
                    if($device[0]->org->logo == Null){
                        $device[0]->org->logo = url('/storage/logo/default.png');
                    }
                    $category = [];

                    foreach ($org_cat as $oc) {
                        $category[$oc->name] = [];
                    }

                    $items = Inventory::where('station_id', '=', $device[0]->station_id)->get();

                    foreach ($items as $i) {

                        // $i->item_cart->id = $i->id;
                        $item = $i;
 
                        if ($item->with_quantity == 1) {
                            $item->with_quantity = true;
                        } else {
                            $item->with_quantity = false;
                        }
                        if ($item->with_payer_name == 1) {
                            $item->with_payer_name = true;
                        } else {
                            $item->with_payer_name = false;
                        }

                        $cat = Category::find($item->category_id);

                        array_push($category[$cat->name], $item);
                    }

                    $data = [
                        'device' => $device[0],
                        'items' => $category
                    ];

                    $res = [
                        'status' => true,
                        'data' => $data
                    ];
                    return response()->json($res);
                } else {
                    $res = [
                        'status' => false,
                        'data' => 'Device not found in system'
                    ];
                    return response()->json($res);
                }
                //
            } else {
                $res = [
                    'status' => false,
                    'data' => 'API_KEY Not correct'
                ];
                return response()->json($res);
            }
        } else {
            $res = [
                'status' => false,
                'data' => 'API_USER Not Found'
            ];
            return response()->json($res);
        }
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_user' => 'required',
            'api_key' => 'required',
            'device_id' => 'required',
        ]);

        if ($validator->fails()) {
            $res = [
                'status' => false,
                'data' => $validator->errors(),
            ];
            return response()->json($res);
        }

        $api = Api::where('api_user', '=', $request->api_user)->get();
        if (count($api) > 0) {
            if ($api[0]->api_key == $request->api_key) {
                $d = Device::where('id', '=', $request->device_id)->get();

                if (count($d)>0) {

                    $device = Device::where('id', '=', $d[0]->id)->with('org')->with('station')->get();

                    $org_cat = Category::where('org_id', '=', $device[0]->org_id)->get();

                    if($device[0]->org->logo == Null){
                        $device[0]->org->logo = url('/storage/logo/default.png');
                    }
                    
                    $category = [];

                    foreach ($org_cat as $oc) {
                        $category[$oc->name] = [];
                    }

                    $items = Inventory::where('station_id', '=', $device[0]->station_id)->get();

                    foreach ($items as $i) {

                        // $i->item_cart->id = $i->id;
                        $item = $i;

                        if ($item->with_quantity == 1) {
                            $item->with_quantity = true;
                        } else {
                            $item->with_quantity = false;
                        }
                        if ($item->with_payer_name == 1) {
                            $item->with_payer_name = true;
                        } else {
                            $item->with_payer_name = false;
                        }

                        $cat = Category::find($item->category_id);

                        array_push($category[$cat->name], $item);
                    }

                    $data = [
                        'device' => $device[0],
                        'items' => $category
                    ];

                    $res = [
                        'status' => true,
                        'data' => $data
                    ];
                    return response()->json($res);
                } else {
                    $res = [
                        'status' => false,
                        'data' => 'Device not found in system'
                    ];
                    return response()->json($res);
                }
                //
            } else {
                $res = [
                    'status' => false,
                    'data' => 'API_KEY Not correct'
                ];
                return response()->json($res);
            }
        } else {
            $res = [
                'status' => false,
                'data' => 'API_USER Not Found'
            ];
            return response()->json($res);
        }
    }
}
