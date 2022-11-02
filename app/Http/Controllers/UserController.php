<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

    public function index()
    {
        $managers = User::where(['org_id'=> Auth::user()->org->id, 'role_id'=>4])->get();
        $supervisors = User::where(['org_id'=> Auth::user()->org->id, 'role_id'=>3])->get();

        return view('pages.org.user.list', compact('managers','supervisors'));
    }

    public function show_register()
    {
        $roles = Role::all();
        return view('pages.org.user.register', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role'],
            'org_id' => Auth::user()->org->id,
        ]);

        if ($user) {
            return redirect()->route('list_users')->with('success', 'New User is created, thank you!!!');
        }else{
            return back()->with('error', 'failed to create user');
        }
    }
}
