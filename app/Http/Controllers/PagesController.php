<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public $categories;
    public function __construct()
    {
        $this->categories = Category::where('root', Category::categoryRoot)->get();
    }

    public function about()
    {
        return view('frontend.pages.about', ['categories' => $this->categories]);
    }
}
