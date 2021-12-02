<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function get()
    {
        $product = Product::all();

        return response()->json(
            [
                "message" => "Success",
                "data" => $product
            ]
        );
    }

    function getById($id)
    {
        $product_satu = Product::where(['id' => $id])->get();
        return response()->json([
            "message" => "Success",
            "data" => $product_satu

        ]);
    }

    function post(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $product
            ]
        );
    }

    

    function put($id, Request $request){
        $product = Product::where(['id' => $id])->first();
        if ($product) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
            $product->active = $request->active ? $request->active : $product->active;
            $product->description = $request->description ? $request->description : $product->description;

            $product->save();

            return response()->json([
                "message" => "PUT Method Success",
                "data" => $product
            ]);
        }
            return response()->json([
                "message" => "PUT Method Failed". $id
            ]);
        
        
    }

    function delete($id){
        return response()->json([
            "message" => "DELETE Method Success".$id
        ]);
    }
}
