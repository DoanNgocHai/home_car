<?php

namespace App\Http\Controllers\User\Car;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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

        $params['user_id'] = Auth::id();

        $params['slug'] = Str::slug($params['title']);

        if (isset($params['images'])) {
            $params['images'] = json_encode($params['images']);
        }

        $item = $this->car->create($params);

        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->car->where('id', $id)->first();

        if (!$item) {
            return response()->json([
                'message' => 'car not found',
            ], 404);
        }

        $item['images'] = json_decode($item['images']);

        return response()->json($item, 200);
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

        $item = $this->car->where('id', $id)->first();

        if (!$item) {
            return response()->json([
                'message' => 'car not found',
            ], 404);
        }

        $params['slug'] = Str::slug($params['title']);

        if (isset($params['images'])) {
            $params['images'] = json_encode($params['images']);
        }

        $item->update($params);

        return response()->json($item, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->car->where('id', $id)->first();

        if (!$item) {
            return response()->json([
                'message' => 'car not found',
            ], 404);
        }

        $item->delete();

        return response()->json($item, 200);
    }
}
