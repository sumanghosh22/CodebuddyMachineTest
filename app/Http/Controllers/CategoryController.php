<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function manageCategory()
    {
        $categories = Category::where('parent_category_id', '=', 0)->get();
        $allCategories = Category::pluck('name','id')->all();
        return view('category.add',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $this->validate($request, [
        		'name' => 'required',
        	]);
        $input = $request->all();
        $input['parent_category_id'] = empty($input['parent_category_id']) ? 0 : $input['parent_category_id'];
        //dd($input);
        
        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }
    public function showCategories(Request $request)
    {
        $categories = Category::all();
    
        return view('category.index',compact('categories'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $categoryDetails = Category::find($id);
        $allCategories = Category::get();
        return view('category.edit',compact('categoryDetails','allCategories'));

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
        $this->validate($request, [
            'name' => 'required',
        ]);
    $input = $request->except('_token');
    //dd($input);
    $input['parent_category_id'] = empty($input['parent_category_id']) ? 0 : $input['parent_category_id'];
    //dd($input);
    
    Category::where('id',$id)->update($input);
    return back()->with('success', 'Category update successfully.');

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
        Category::where('id',$id)->delete();
        return back()->with('success', 'Category Deleted successfully.');

    }
}
