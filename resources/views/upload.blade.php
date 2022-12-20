<html>
<body>

  <form method="post" action="{{route('product.createProduct')}}" 
  enctype="multipart/form-data">
    @csrf
    <label for="">Nama Product</label>
    <input type="text" name="namaProduct" id=""> <br> <br>
    <label for="">Berat Satuan</label>
    <input type="text" name="namaSatuan" id=""> <br> <br>
    <label for="">Harga</label>
    <input type="text" name="harga" id=""> <br> <br>
    <label for="">Desc</label>
    <input type="text" name="desc" id=""> <br> <br>
  <input type="file" name="gambar" accept="image/*">
    <button type="submit">Tambah</button>
  </form>


</body>
</html>