<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $car;

    public function __construct(Cars $car)
    {
        $this->car = $car;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->car->paginate($request->all());
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $car = $this->car->create($params);

        return response()->json($car, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = $this->car->where('id', $id)->first();

        if (!$car) {
            return response()->json([
                'message' => 'car not found'
            ], 404);
        }

        return response()->json($car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->all();

        $car = $this->car->where('id', $id)->first();

        if (!$car) {
            return response()->json([
                'message' => 'car not found'
            ], 404);
        }

        $car->update($params);

        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = $this->car->where('id', $id)->first();
        if (!$car) {
            return response()->json([
                'message' => 'car not found'
            ], 404);
        }
        $car->delete();
        return response()->json($car, 200);
    }
}
