<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add user</title>
</head>
<body>
    

    <div>
        <label for="nama" class="form-label">Nama Product</label>
        <input type="text" class="form-control" id="namaProduct" ><br><br>

        <label for="" class="form-label">Berat Satuan</label>
        <input type="text" class="form-control" id="beratSatuan" ><br><br>

        <label for="" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" ><br><br>


        <label for="" class="form-label">Desc</label>
        <input type="text" class="form-control" id="desc" ><br><br>

        <input type="file" name="gambar" id="gambar" accept="image/*">

        <button onclick="add()" id="submit">Simpan</button>
    </div>


<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

    add = () => {
        let nama = $("#namaProduct").val()
        let beratSatuan = $("#beratSatuan").val()
        let harga = $("#harga").val()
        let desc = $("#desc").val()
        let gambar = $("#gambar")[0].files[0]
    
        if(nama == "") return alert("Nama tidak boleh kosong")
        if(beratSatuan == "") return alert("Berat Satuan tidak boleh kosong")
        if(harga == "") return alert("Harga tidak boleh kosong")
        if(desc == "") return alert("deskripsi tidak boleh kosong")

        let formData = new FormData();

        formData.append("nama_product", nama)
        formData.append("berat_satuan", beratSatuan)
        formData.append("harga_barang", harga)
        formData.append("desc", desc)
        formData.append("file", gambar)

        $.ajax({
            url: "http://localhost:8000/api/product",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: _ => {
                window.location.href = "http://localhost:8000/usejeq/products"
            }
        })
    }

</script>

</body>
</html>