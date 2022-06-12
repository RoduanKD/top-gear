<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarsResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Car::latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('color')) {
            $query->whereHas('colors', function ($q) use ($request){
                $q->whereIn('id', $request->color);
            });
        }

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->Where('brand', 'like', "%$request->q%")
                    ->orWhere('model', 'like', "%$request->q%")
                    ->orWhere('color', 'like', "%$request->q%");
            });
        }
        // Homework: add colors filter

        $cars = $query->paginate(3);
        // $categories = Category::has('cars')->get();
        // $colors = Color::has('cars')->get();

        return CarsResource::collection($cars);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }
}
