<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Station;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id == 4) {
            return redirect()->route('station_dashboard');
        }
        
        $d = strtotime("today");
        $start_week = strtotime("-7 days",$d);
        $end_week = strtotime("today",$d);
        $start = date("Y-m-d",$start_week); 
        $end = date("Y-m-d",$end_week);

        $sale_summary_date = [
            'start'=>$start,
            'end'=>$end,
        ];
        
        $transaction = Transaction::where('org_id', Auth::user()->org_id)->whereBetween('created_at', [$start.'-00-00-00', $end.'-23-59-59'])->get();
        $revenue=0;
        $litres=0;
        if (count($transaction)>0) {
            # code...
            foreach ($transaction as $key => $t) {
                $revenue = $revenue + $t->amount;
                $litres = $litres + $t->quantity;
            }
        }

        $stations = Station::where('org_id', Auth::user()->org_id)->get();

        $supplies = Dispatch::where(['org_id'=>Auth::user()->org_id])->get();

        return view('pages.org.index', compact('revenue', 'litres', 'transaction', 'sale_summary_date', 'stations', 'supplies'));
    }
}
