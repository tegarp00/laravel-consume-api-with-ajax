@extends('templates')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($produk as $prod)
        <div class="col-lg-4">
            <div class="card">
                <img src="{{$prod->file}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Nama Barang: {{$prod->nama_product}}</p>
                    <!-- <p class="card-text">Berat Satuan: {{$prod->berat_satuan}}</p> -->
                    <p class="card-text">Harga: Rp {{number_format($prod->harga_barang)}}</p>
                    <!-- <p class="card-text">Deskripsi: {{$prod->desc}}</p> -->
                    <!-- <p class="card-text">Stok: {{$prod['status'] == true ? 'masih tersedia' : 'sudah habis'}}</p> -->
                    <div>
                        <a class="me-2 btn btn-primary" href="{{route('product.detailProduct', $prod->id)}}">Details</a>
                        <a class="btn btn-success">KitaBeli</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection