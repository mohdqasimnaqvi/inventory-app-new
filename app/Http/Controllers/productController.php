<?php

namespace App\Http\Controllers;

use App\Http\Requests\productStoreRequest;
use App\Http\Requests\productUpdateRequest;
use App\Product;
use App\Products;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function monthly(Request $request)
    {
        $products = Product::all();

        return view('products.monthly', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function daily(Request $request)
    {
        $products = Product::all();

        return view('products.daily', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createMonthly(Request $request)
    {
        return view('products.create.monthly');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createDaily(Request $request)
    {
        return view('products.create.daily');
    }

    /**
     * @param \App\Http\Requests\productStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(productStoreRequest $request)
    {
        $products = Products::create($request->validated());

        $request->session()->flash('products.id', $products->id);

        return redirect()->route('products.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, product $product)
    {
        return view('products.show', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, product $product)
    {
        return view('products.edit', compact('products'));
    }

    /**
     * @param \App\Http\Requests\productUpdateRequest $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(productUpdateRequest $request, product $product)
    {
        $products->update($request->validated());

        $request->session()->flash('products.id', $products->id);

        return redirect()->route('products.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, product $product)
    {
        $products->delete();

        return redirect()->route('products.index');
    }
}
