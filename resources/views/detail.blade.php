@extends('templates')
@section('content')
<div class="container" style="padding-top: 60px;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <img src="{{$produk->file}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="justify-content-center d-flex gap-3">
                        <a class="btn btn-success">KitaBeli</a>
                        <a class="btn btn-warning" href="{{route('product.updateProdct', $produk->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('product.deleteProduct', $produk->id)}}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <p>What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p class="card-text">Nama Barang: {{$produk->nama_product}}</p>
                    <p class="card-text">Berat Satuan: {{$produk->berat_satuan}}</p>
                    <p class="card-text">Harga: Rp {{$produk->harga_barang}}</p>
                    <p class="card-text">Deskripsi: {{$produk->desc}}</p>
                    <p class="card-text">Stok: {{$produk['status'] == true ? 'masih tersedia' : 'sudah habis'}}</p>
            </div>
        </div>
    </div>
</div>
@endsection