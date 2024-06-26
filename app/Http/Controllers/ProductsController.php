<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);

        $data = ['productOne' => 'Apple', 'productTwo' => 'Orange', 'productThree' => 'Banana'];
        return view('products.index')->with('data', $data);

        // with() is a method that accepts an array of data to pass to the view
        return view('products.index')->with([
            'greeting' => 'Hello World!',
            'message' => 'This is a message from the controller.'
        ]);

        // compact() is a helper function that creates an array from the variables passed to it
        $greeting = 'Hello World!';
        $message = 'This is a message from the controller.';
        return view('products.index', compact('greeting', 'message'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required'
        ]);
        // Passing in an array to a model (alternative and preferred way)
        $product = Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        // Passing in an object to a model
        // $product = new Product();

        // $product->product_name = $request->product_name;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->save();
        return redirect('/products');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
        // Passing in an array to a view
        // $data = ['productOne' => 'Apple', 'productTwo' => 'Orange', 'productThree' => 'Banana'];
        // return view('products.index', ['products' => $data[$name] ?? 'Product ' . $name . ' does not exist.']);
    }
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit')->with('product', $product);
    }
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->update([
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')
        ]);
        return redirect('/products');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
