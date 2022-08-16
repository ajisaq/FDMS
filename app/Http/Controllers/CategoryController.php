<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

         return view('pages.org.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.org.category.add');
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
            'type' => ['required'],
            'p' => ['nullable'],
        ]);


        if ($validator->fails()) {
            return back()->with($validator->errors());
        }

        $category = Category::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        if ($category) {
            if ($request->p == "main") {
                return redirect()->route('show_category_info', ['id' => $category->id])->with('success', "Category is added, check below info to verify. Thank you!");
            }
            return back()->with('succes', "cartegory is added successfuly. Thank you!");
            // return redirect()->route('show_cluster_info', ['id' => $cluster->id])->with('success', "Cluster is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Category is not added, Try Again. Thank you!");
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
        $category = Category::find($id);

        return view('pages.org.category.info', compact('category'));
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
            'type' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->with($validator->errors());
        }
        
         $category = Category::where('id', '=', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        if ($category) {
            return back()->with('succes', "cartegory is Updated successfuly. Thank you!");
            // return redirect()->route('show_cluster_info', ['id' => $cluster->id])->with('success', "Cluster is added, check below info to verify. Thank you!");
        } else {
            return back()->with('error', "Category is not Updated, Try Again. Thank you!");
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
        $category = Category::where('id', '=', $id)->destroy();

        if ($category) {
            return redirect()->route('list_categories')->with('success', 'category is deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete category, Try again later.');
        }
    }
}
