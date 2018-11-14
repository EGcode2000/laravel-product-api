<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Product::all();

        $response = [
            'msg' => 'Succes!!',
            'products' => $products
        ];
        return response()->json($products, 200);
        //return response()->json($response, 200);
        //return "it works index";
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validateProduct($request);
        /*
        $this->validate($request, [
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required|numeric|gte:0',     
        ]);*/
        
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        $product = new Product([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);

        if ($product->save()) {
            $response = [
                'msg' => 'Product created',
                'product' => $product
            ];

            return response()->json($product, 201);
            //return response()->json($response, 201);
        }

        $response = [
            'msg' => 'Error!!'
        ];

        return response()->json($response, 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "it works show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //

        
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($product->update()) {
            $response = [
                'msg' => 'Product edited',
                'product' => $product
            ];
            return response()->json($product, 201);
            //return response()->json($response, 201);
        }

        $response = [
            'msg' => 'Error!!'
        ];

        return response()->json($response, 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validateProduct($request);
        /*$this->validate($request, [
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required|numeric|gte:0',     
        ]); 
        */
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($product->update()) {
            $response = [
                'msg' => 'Product edited',
                'product' => $product
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'Error!!'
        ];

        return response()->json($response, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        if ($product->delete()) {
            $response = [
                'msg' => 'Product deleted',
                'product' => $product
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'Error!!'
        ];

        return response()->json($response, 404);
    }
    
    public function validateProduct ($request){
        $this->validate($request, [
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required|numeric|gte:0',     
        ]); 
    }
}
