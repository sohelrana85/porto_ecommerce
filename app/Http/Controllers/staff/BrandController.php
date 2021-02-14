<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $brands = Brand::with('user')->select('name', 'slug', 'status', 'create_by')->get();
        $brands = Brand::all();
        return view('backend.brand.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|min:2|max:10|unique:brands,name',
            'status'     => 'required'
        ]);
        try {
            Brand::create([
                'name'      => $request->brand_name,
                'slug'      => str_replace(' ', '-', $request->brand_name),
                'status'    => $request->status,
                'create_by' => Auth::id(),
            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'You added a brand name successfully');
        } catch (Exception $ex) {
            session()->flash('type', 'danger');
            session()->flash('message', 'Opps! Something Wrong!');
        }
        return redirect()->back();
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
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
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
        $request->validate([
            'brand_name' => 'required|min:2|max:10|unique:brands,id,' . $id,
            'status'     => 'required'
        ]);

        try {
            $brand = Brand::find($id);

            $brand->name      = $request->brand_name;
            $brand->slug      = str_replace(' ', '-', $request->brand_name);
            $brand->status    = $request->status;
            $brand->create_by = Auth::id();
            $brand->update();

            session()->flash('type', 'success');
            session()->flash('message', 'You have updated the brand name successfully.');
        } catch (Exception $exc) {
            session()->flash('type', 'danger');
            session()->flash('message', $exc->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        session()->flash('message', 'You have Deleted a brand name successfully');
        return redirect()->back();
    }
}
