<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\car;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $query = Car::latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->Where('brand', 'like', "%$request->q%")
                    ->orWhere('model', 'like', "%$request->q%")
                    ->orWhere('colors', 'like', "%$request->q%");
            });
        }

        $cars = $query->paginate(4);

        $categories = Category::has('cars')->get();

        return view('public.categories.index', compact('categories'));
    }
}
