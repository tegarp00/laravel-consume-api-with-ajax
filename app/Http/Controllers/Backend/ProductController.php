<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $produk = TableProduct::query()->get();
        if (!$produk) {
            return response()->json([
                "status" => 404,
                "message" => "Product not found",
                "data" => []
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "Berhasil mendapatkan",
            "data" => $produk,
        ]);
    }

    public function show($id) 
    {
        $product = TableProduct::query()->where('id', $id)->first();
        if (!$product) {
            return response()->json([
                "status" => 404,
                "message" => "Product not found",
                "data" => []
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "Data Berhasil didapatkan",
            "data" => $product,
        ]);
    }

    public function store(Request $request)
    {

        $payload = [
            'nama_product'=> $request->input("nama_product"),
            'berat_satuan'=> $request->input("berat_satuan"),
            'harga_barang'=> $request->input("harga_barang"),
            'desc'=> $request->input("desc"),
            'file'=> $request->file->store('product', 'public'),
          ];
          TableProduct::query()->create($payload);
          return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $payload,
          ]);
    }

    public function update(Request $request, $id) 
    {
        $payload = $request->except(['file']);
        $produk = TableProduct::find($id);
        if (isset($request->file)) {
            Storage::disk('public')->delete($produk->file);
            $payload['file'] = $request->file->store('product', 'public');
        }

        $produk->update($payload);

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $produk,
        ]);
    }

    public function destroy($id)
    {
        $produk = TableProduct::find($id);
        if(!$produk) {
            return response()->json([
                "status" => 404,
                "message" => "Product not found",
                "data" => []
            ]);
        }


        $produk->delete();
        return response()->json([
            "status" => 200,
            "message" => "Product berhasil di hapus",
        ]);
    }
}
