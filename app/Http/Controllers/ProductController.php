<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return response()->json($product);
    }

    public function show($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function create(Request $request){

        $this->validate($request,[
            'nama'      => 'required|string',
            'harga'     => 'required|integer',
            'warna'     => 'required|string',
            'kondisi'   => 'required|in:baru,lama',
            'deskripsi' => 'string'
        ]);

        $data = $request->all();
        $product = Product::create($data);

        return response()->json($product);
    }
}
