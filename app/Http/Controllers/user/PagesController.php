<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Slider;

class PagesController extends Controller
{
    public function index()
    {
      $sliders = Slider::orderBy('priority', 'asc')->get();
      $products = Product::orderBy('id', 'desc')->paginate(12);
      return view('user.index', compact('products', 'sliders'));
    }

    public function contact()
    {
      return view('user.backup.contact');
    }

    public function search(Request $request)
    {
      $search = $request->search;

        $products = Product::orWhere('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('slug', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        ->orWhere('quantity', 'like', '%'.$search.'%')
        ->orderBy('id', 'desc')
        ->paginate(12);

        return view('user.backup.product.search', compact('search', 'products'));
    }

}
