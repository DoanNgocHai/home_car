<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $color;

    public function __construct(Colors $color)
    {
        $this->color = $color;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->color->paginate($request->all());
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
        $color = $this->color->create($params);

        return response()->json($color, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $color = $this->color->where('id', $id)->first();

        if (!$color) {
            return response()->json([
                'message' => 'color not found'
            ], 404);
        }

        return response()->json($color);
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

        $color = $this->color->where('id', $id)->first();

        if (!$color) {
            return response()->json([
                'message' => 'color not found'
            ], 404);
        }

        $color->update($params);

        return response()->json($color);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = $this->color->where('id', $id)->first();
        if (!$color) {
            return response()->json([
                'message' => 'color not found'
            ], 404);
        }
        $color->delete();
        return response()->json($color, 200);
    }
}
