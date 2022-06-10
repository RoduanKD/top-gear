<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            // $carsID = DB::table('Car_Color')
            //     ->select('car_id')
            //     ->whereIn('color_id', $request->color)
            //     ->get();

            //  $query->whereIn('id', $carsID->pluck('car_id'))->get();

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

        $cars = $query->paginate(1);
        $categories = Category::has('cars')->get();
        $colors = Color::has('cars')->get();

        return view('public.cars.index', compact('cars', 'categories','colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('public.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
