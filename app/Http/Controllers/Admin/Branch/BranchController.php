<?php

namespace App\Http\Controllers\Admin\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\CreateBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brands;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    private $brand;

    public function __construct(Brands $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->brand->paginate($request->all());
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
    public function store(CreateBrandRequest $request)
    {
        $params = $request->all();
        $brand = $this->brand->create($params);

        return response()->json($brand, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = $this->brand->where('id', $id)->first();

        if (!$brand) {
            return response()->json([
                'message' => 'brand not found'
            ], 404);
        }

        return response()->json($brand);
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
    public function update(UpdateBrandRequest $request, string $id)
    {
        $params = $request->all();

        $brand = $this->brand->where('id', $id)->first();

        if (!$brand) {
            return response()->json([
                'message' => 'brand not found'
            ], 404);
        }

        $brand->update($params);

        return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = $this->brand->where('id', $id)->first();
        if (!$brand) {
            return response()->json([
                'message' => 'brand not found'
            ], 404);
        }
        $brand->delete();
        return response()->json($brand, 200);
    }
}
