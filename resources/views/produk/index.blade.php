<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>products</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Product</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    <div class="container justify-center">
        <a href="{{route('add')}}"><button>Tambah Produk</button></a>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Berat Satuan</th>
                    <th>Harga</th>
                    <th>Desc</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableProduct">
            </tbody>
        </table>
    </div>



    
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

    $.ajax({
        url: "http://localhost:8000/api/product/list",
        method: "GET",
        dataType: "json",
        success: response => {
            let listProduct = response.data
            let html = ""

            for (product of listProduct) {
                html += `
                <tr>
                    <td>${product.nama_product}</td>
                    <td>${product.berat_satuan}</td>
                    <td>${product.harga_barang}</td>
                    <td>${product.desc}</td>
                    <td><img width="100" src="http://localhost:8000/storage/${product.file}" alt=""></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="http://localhost:8000/usejeq/products/${product.id}">Detail</a>
                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Hapus</button>
                    </td>
                </tr>
                `
            }
            $("#tableProduct").append(html)
        }
    })

    deleteProduct = (id) => {
        $.ajax({
            url: `http://localhost:8000/api/product/${id}`,
            method: "POST",
            dataType: "json",
            success: _ => {
                window.location.href = ""
            }
        })
    }

</script>

</body>
</html>