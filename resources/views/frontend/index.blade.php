<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jquery</title>
</head>
<body>

    <div>
        <a href="{{route('add')}}"><button>Tambah Pengguna</button></a>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tablePengguna">
            </tbody>
        </table>
    </div>



    
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

    $.ajax({
        url: "http://localhost:8000/api/pengguna/list",
        method: "GET",
        dataType: "json",
        success: response => {
            let listPengguna = response.data
            let html = ""

            for(pengguna of listPengguna) {
                html += `
                <tr>
                    <td>${pengguna.nama}</td>
                    <td>${pengguna.email}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="http://localhost:8000/usejeq/detail/${pengguna.id}">Detail</a>
                        <button class="btn btn-danger btn-sm" onclick="deletePengguna(${pengguna.id})">Hapus</button>
                    </td>
                </tr>
                `
            }
            $("#tablePengguna").append(html)
        }
    });

    deletePengguna = (id) => {
        $.ajax({
            url: `http://localhost:8000/api/pengguna/${id}`,
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