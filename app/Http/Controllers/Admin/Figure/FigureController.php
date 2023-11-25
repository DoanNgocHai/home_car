<?php

namespace App\Http\Controllers\Admin\Figure;

use App\Http\Controllers\Controller;
use App\Models\Figures;
use Illuminate\Http\Request;

class FigureController extends Controller
{
    private $figure;

    public function __construct(Figures $figure)
    {
        $this->figure = $figure;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->figure->paginate($request->all());
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
        $figure = $this->figure->create($params);

        return response()->json($figure, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $figure = $this->figure->where('id', $id)->first();

        if (!$figure) {
            return response()->json([
                'message' => 'figure not found'
            ], 404);
        }

        return response()->json($figure);
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

        $figure = $this->figure->where('id', $id)->first();

        if (!$figure) {
            return response()->json([
                'message' => 'figure not found'
            ], 404);
        }

        $figure->update($params);

        return response()->json($figure);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $figure = $this->figure->where('id', $id)->first();
        if (!$figure) {
            return response()->json([
                'message' => 'figure not found'
            ], 404);
        }
        $figure->delete();
        return response()->json($figure, 200);
    }
}
