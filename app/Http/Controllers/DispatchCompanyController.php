<?php

namespace App\Http\Controllers;

use App\Models\DispatchCompany;
use App\Models\OrgLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DispatchCompanyController extends Controller
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
        $dispatch_companies = DispatchCompany::where('org_id', '=', Auth::user()->org_id)->get();
        $locations = OrgLocation::where(['org_id'=>Auth::user()->org_id])->get();

        return view('pages.org.dispatch_companies.list', compact('dispatch_companies', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = OrgLocation::where(['org_id'=>Auth::user()->org_id])->get();

        return view('pages.org.dispatch_companies.add', compact('locations'));
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
            'phone' => ['nullable'],
            'location'=> ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $d_company = DispatchCompany::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'location_id' => $request->location,
            'org_id' => Auth::user()->org->id,
        ]);

        if ($d_company) {
            return redirect()->route('list_d_companies')->with('success', "Dispatch company is added to your organization. Thank you!");
        }else{
            return back()->with('error', "Failed to add dispatch company, Try Again. Thank you!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DispatchCompany  $dispatchCompany
     * @return \Illuminate\Http\Response
     */
    public function show(DispatchCompany $dispatchCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DispatchCompany  $dispatchCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(DispatchCompany $dispatchCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DispatchCompany  $dispatchCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['nullable'],
            'location'=> ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $d_company = DispatchCompany::where(['org_id'=>Auth::user()->org_id, 'id'=>$id])->update([
            'name' => $request->name,
            'name' => $request->phone,
            'location_id' => $request->location,
        ]);

        if ($d_company) {
            return redirect()->route('list_d_companies')->with('success', "Dispatch company is Updated. Thank you!");
        }else{
            return back()->with('error', "Failed to update dispatch company, Try Again. Thank you!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DispatchCompany  $dispatchCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $d_company = DispatchCompany::where(['org_id'=> Auth::user()->org_id, 'id'=> $id])->delete();

        if ($d_company) {
            return redirect()->route('list_cluster_types')->with('success', 'Dispatch company is deleted.');
        } else {
            return back()->with('error', 'Failed to delete dispatch company, Try again later.');
        }
    }
}
