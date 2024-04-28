<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        //print URL
        print_r(route('products')); // the nickname of the route
        //direcrly in the view
        return view('products.index');
        
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
    public function show($name)
    {
        $data = ['productOne' => 'Apple', 'productTwo' => 'Orange', 'productThree' => 'Banana'];
        return view('products.index', ['products' => $data[$name] ?? 'Product ' . $name . ' does not exist.']);
    }
}
