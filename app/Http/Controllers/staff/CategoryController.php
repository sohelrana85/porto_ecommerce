<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::/*select('id', 'root', 'name')->*/where('root', '0')->get();
        return view('backend.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('root', '0')->get();
        return view('backend.category.create', compact('categories'));
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
            'root'   => 'required',
            'name'   => 'required|min:3|max:40|unique:categories',
            'status' => 'required'
        ]);
        try {
            Category::create([
                'root'      => $request->root,
                'name'      => $request->name,
                'slug'      => slugify($request->name),
                'status'    => $request->status,
                'create_by' => Auth::id(),
            ]);

            setMessage('success', 'You added a category name successfully');
        } catch (Exception $ex) {
            setMessage('danger', 'Opps! Something Wrong!');
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
        $cat = Category::find($id);
        $categories = Category::where('root', '0')->get();
        return view('backend.category.edit', compact('categories', 'cat'));
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
            'root' => 'required',
            'name' => 'required|min:3|max:40|unique:categories,id,' . $id,
            'status' => 'required'
        ]);

        try {
            $category = Category::find($id);

            $category->root      = $request->root;
            $category->name      = $request->name;
            $category->slug      = slugify($request->name);
            $category->status    = $request->status;
            $category->create_by = Auth::id();
            $category->save();

            setMessage('success', 'You updated a category name successfully');
        } catch (Exception $ex) {
            setMessage('danger', 'Opps! Something Wrong!');
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

        $check =  Category::where('root', $id)->get();

        // if (count($check) == 0) {
        if (!count($check)) {
            Category::find($id)->delete();
            setMessage('success', 'Yes! You have deleted the Category Successfully');
        } else {
            setMessage('danger', 'Root Category Cannot Delete!');
        }
        return redirect()->back();
    }
}
