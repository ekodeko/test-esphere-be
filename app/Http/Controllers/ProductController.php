<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'data'  => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        Product::create($request->all());
        return response()->json([
            'message'   => 'Product created successfully',
            'data'  => $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->checkExists($id);

        return response()->json([
            'data'  => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateProductRequest $request, string $id)
    {
        $this->checkExists($id);

        Product::where('id', $id)->update([
            'name'  => $request->name,
            'price'  => $request->price,
            'stock'  => $request->stock,
        ]);

        return response()->json([
            'message'   => 'Product updated successfully',
            'data'  => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkExists($id);

        Product::where('id', $id)->delete();
        return response()->json([
            'message'   => 'Product deleted successfully',
            'data'  => null
        ]);
    }

    protected function checkExists($id)
    {
        $product = Product::where('id', $id)->first();
        if (!$product) {
            return response()->json([
                'error'   => 'Data is not found',
                'data'  => null
            ], 404);
        }
        return $product;
    }

    function soal_3()
    {
        $this->getDiscount(10000, 'GOLD');
    }

    function getDiscount($price, $tier)
    {
        switch ($tier) {
            case 'GOLD':
                return $price * 0.8;
                break;
            case 'SILVER':
                return $price * 0.9;
                break;

            default:
                return $price;
                break;
        }
    }
}
