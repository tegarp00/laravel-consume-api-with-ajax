<html>
<body>

  <form method="post" action="{{route('product.updateProduct', $produk->id)}}" 
  enctype="multipart/form-data">
    @csrf
    <label for="">Nama Product</label>
    <input type="text" name="namaProduct" id="" value="{{$produk->nama_product}}"> <br> <br>
    <label for="">Berat Satuan</label>
    <input type="text" name="namaSatuan" id="" value="{{$produk->berat_satuan}}"> <br> <br>
    <label for="">Harga</label>
    <input type="text" name="harga" id="" value="{{$produk->harga_barang}}"> <br> <br>
    <label for="">Desc</label>
    <input type="text" name="desc" id="" value="{{$produk->desc}}"> <br> <br>
  <input type="file" name="gambar" accept="image/*">
    <button type="submit">Tambah</button>
  </form>


</body>
</html>