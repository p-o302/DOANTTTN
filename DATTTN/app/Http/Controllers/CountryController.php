<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Country::latest()->paginate(5);
        return view('admincp.country.listCountry',compact('list'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $list = Country::all();
        return view('admincp.country.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data['title'];
        $country->description = $data['description'];
        $country->slug = $data['slug'];
        $country->status = $data['status'];
        $country->save();
        return redirect(route('country.index'))->with('flash_message','Country add successfully');
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
        $country = Country::findOrFail($id);
        $list = Country::all();
        return view('admincp.country.form', compact('list','country'));
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
        $data = $request->all();
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->description = $data['description'];
        $country->slug = $data['slug'];
        $country->status = $data['status'];
        $country->save();
        // return redirect(route('country.create'));
        return redirect(route('country.index'))->with('flash_message','Country add successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        // return redirect()->back();
        return redirect(route('country.index'))->with('flash_message','Country add successfully');
    }
}
