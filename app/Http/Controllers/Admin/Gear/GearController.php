<?php

namespace App\Http\Controllers\Admin\Gear;

use App\Http\Controllers\Controller;
use App\Models\Gears;
use Illuminate\Http\Request;

class GearController extends Controller
{
    private $gear;

    public function __construct(Gears $gear)
    {
        $this->gear = $gear;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->gear->paginate($request->all());
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
        $gear = $this->gear->create($params);

        return response()->json($gear, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gear = $this->gear->where('id', $id)->first();

        if (!$gear) {
            return response()->json([
                'message' => 'gear not found'
            ], 404);
        }

        return response()->json($gear);
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

        $gear = $this->gear->where('id', $id)->first();

        if (!$gear) {
            return response()->json([
                'message' => 'gear not found'
            ], 404);
        }

        $gear->update($params);

        return response()->json($gear);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gear = $this->gear->where('id', $id)->first();
        if (!$gear) {
            return response()->json([
                'message' => 'gear not found'
            ], 404);
        }
        $gear->delete();
        return response()->json($gear, 200);
    }
}
