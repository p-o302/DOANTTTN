<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::latest()->paginate(5);
        return view('admincp.category.listCategory',compact('list'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $list = Category::all();
        return view('admincp.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect(route('category.index'))->with('flash_message','Category add successfully');
        // return redirect()->back();
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
        $category = Category::findOrFail($id);
        $list = Category::all();
        return view('admincp.category.form', compact('list', 'category'));
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
        $category = Category::findOrFail($id);
        $category->update([
           'title' => $request->input('title'),
           'slug' => $request->input('slug'),
           'description' => $request->input('description'),
           'status' => $request->input('status'),
        ]);
        return redirect(route('category.index'))->with('flash_message','Producer updated successfully');
        // return Redirect::route('producer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        // return redirect(route(''))->back();
        return redirect(route('category.index'))->with('flash_message','Producer deleted successfully');
    }
}
