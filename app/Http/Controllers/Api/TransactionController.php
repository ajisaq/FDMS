<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Device;
use App\Models\Inventory;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'api_user' => 'required',
            'api_key' => 'required',
            'agent_id' => 'required',
            'ref_id' => 'required',
            'device_id' => 'required',
            'item_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
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

                $device = Device::find($request->device_id);

                $agent = User::find($request->agent_id);

                $trans = Transaction::where('ref', '=', $request->ref_id)->get();

                if (count($trans) > 0) {
                    $res = [
                        'status' => false,
                        'data' => 'RECORD_EXIST',
                    ];
                    return response()->json($res);
                } else {
                    $stock = Stock::where(['inventory_id'=>$request->item_id])->get();
                    
                    if (count($stock)>0) {
                        if ($stock[0]->quantity > $request->quantity) {
                            // create transaction for sale
                            $transaction = Transaction::create([
                                'org_id' => $device->org_id,
                                'user_id' => $request->agent_id,
                                'device_id' => $request->device_id,
                                'inventory_id' => $request->item_id,
                                'customer_id' => $request->customer_id,
                                'quantity' => $request->quantity,
                                'amount' => $request->amount,
                                'station_id'=>$stock[0]->inventory->station->id,
                                'ref' => $request->ref_id,
                                'type' => "sale",
                            ]);
                            Transaction::where('id', $transaction->id)->update([
                                'station_id'=>$stock[0]->inventory->station->id,
                            ]);

        
                            if ($transaction) {

                                $sq = $stock[0]->quantity-$request->quantity;
                                $s_up = Stock::where('id', '=', $stock[0]->id)->update([
                                    'quantity'=>$sq,
                                ]);

                                $res = [
                                    'status' => true,
                                    'data' => $transaction
                                ];
                                return response()->json($res);
                                // return $transaction;
                            } else {
                                $res = [
                                    'status' => false,
                                    'data' => 'Fail to store transaction'
                                ];
                                return response()->json($res);
                            }
                        }else{
                            $res = [
                                'status' => false,
                                'data' => 'Product is out of stock',
                            ];
                            return response()->json($res);
                        }

                    }else{
                        $res = [
                            'status' => false,
                            'data' => 'Product is not in stock',
                        ];

                        return response()->json($res);
                    }
                }
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
