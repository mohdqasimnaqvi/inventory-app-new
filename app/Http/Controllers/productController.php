<?php

namespace App\Http\Controllers;

use App\Http\Requests\productStoreRequest;
use App\Http\Requests\productUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function monthlyTotal(Request $request)
    {
        $products = Product::latest()->get();


        return view('total.monthly', compact('products'));
    }
    public function dailyTotal(Request $request)
    {
        $products = Product::latest()->get();


        return view('total.daily', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function monthly(Request $request)
    {
        $products = Product::latest()->where('is_daily', '=', 0)->paginate(10);


        return view('product.monthly', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function daily(Request $request)
    {
        $products = Product::latest()->where('is_daily', '=', 1)->paginate(10);

        return view('product.daily', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createMonthly(Request $request)
    {
        return view('product.create.monthly');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createDaily(Request $request)
    {
        return view('product.create.daily');
    }

    /**
     * @param \App\Http\Requests\productStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(productStoreRequest $request)
    {
        $product = Product::create($request->validated());

        $request->session()->flash('product.id', $product->id);

        return redirect('/product/' . ($request->all()['is_daily'] ? 'daily' : 'monthly'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * @param \App\Http\Requests\productUpdateRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(productUpdateRequest $request, product $product)
    {
        $path = $request->file('image')->store('avatars');
        dd($path);

        // $product->update($request->validated());

        // $request->session()->flash('product.id', $product->id);

        // return redirect('/product/' . ($request->all()['is_daily'] ? 'daily' : 'monthly'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, product $product)
    {
        $product->delete();

return redirect('/product/' . $request->all()['is_daily']);
    }
}
