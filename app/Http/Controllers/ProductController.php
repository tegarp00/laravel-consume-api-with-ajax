<?php

namespace App\Http\Controllers;

use App\Models\TableProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = TableProduct::paginate(10);

        return view('list', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request) {
        if($request->method() == "GET") return view('upload');
    
        
    
        return redirect()->back();
    }

    public function createProduct(Request $request) {
        $file = $request->file("gambar");
        // $file->move("gambar", $file->getClientOriginalName());
        $filename = $file->hashName();
        $file->move("product", $filename);
        $path = "/product/".$filename;
        //$file->store('gambar', 'public');


        $payload = [
            'nama_product'=> $request->input("namaProduct"),
            'berat_satuan'=> $request->input("namaSatuan"),
            'harga_barang'=> $request->input("harga"),
            'desc'=> $request->input("desc"),
            'file'=> $path,
          ];
          TableProduct::query()->create($payload);
          return redirect()->back();
    }

    public function detailProduct($id)
    {
      $produk = TableProduct::query()->where("id", $id)->first();
      return view("detail", compact('produk'));
    }


    public function updateProdct($id) {
        $produk = TableProduct::find($id);

        return view('update', compact('produk'));
    }

    public function updateProduct(Request $request, $id)
    {
        $produk = TableProduct::find($id);
        $produk->nama_product = $request->input('namaProduct');
        $produk->berat_satuan = $request->input('namaSatuan');
        $produk->harga_barang = $request->input('harga');
        $produk->desc = $request->input('desc');

        // cek input image
        if($request->file("gambar")) {
            $file = $request->file("gambar");
            $filename = $file->hashName();
            $file->move("product", $filename);
            $path = "/product/".$filename;

            $produk->file = $path;
        }

        $produk->update();
        return redirect('/product/list');
    }

    public function deleteProduct($id)
    {
      $produk = TableProduct::query()->where("id", $id)->delete();
      return redirect('/product/list');
    }
}
