<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>products</title>
</head>
<body>


    <div>
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