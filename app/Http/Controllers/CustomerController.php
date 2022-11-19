<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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
        $customers = Customer::where('org_id', '=', Auth::user()->org_id)->get();

        return view('pages.customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.add');
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
            'contact' => ['required'],
            'email' => ['required', 'email', 'unique:customers,email'],
            'phone' => ['required', 'unique:customers,phone'],
        ]);

        if ($validator->fails()) {
            // return the error only
            // return response()->json(['error' => $validator->errors()->first()]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customer = Customer::create([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if ($customer) {
            return redirect()->route('show_customer_info', ['id' => $customer->id])->with('success', "Customer is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Customer is not added, Try Again. Thank you!");
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
        $customer = Customer::find($id);

        return view('pages.customer.info', compact('customer'));
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
            'contact' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $customer = Customer::where('id', '=', $id)->update([
            'org_id' => Auth::user()->org_id,
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if ($customer) {
            return  back()->with('success', "Customer is update, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Customer is not update, Try Again. Thank you!");
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
        $customer = Customer::where('id', '=', $id)->delete();

        if ($customer) {
            return redirect()->route('list_customers')->with('success', 'customer is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete customer, Try again later.');
        }
    }
}
