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
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" value=""><br><br>
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" value=""><br><br>
        <label for="nama" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" value="">

        <button onclick="update()" id="submit">Simpan</button>
    </div>


<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
    lastSegment = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
    $.ajax({
        url: "http://localhost:8000/api/pengguna/" + lastSegment,
        method: "GET",
        dataType: "json",
        success: response => {
            let pengguna = response.data
            $("#nama").val(pengguna.nama)
            $("#email").val(pengguna.email)
        }
    })


    function update(){
        let nama = $("#nama").val()
        let email = $("#email").val()
        let password = $("#password").val()
        let fd = new FormData();
        fd.append("nama", nama);
        fd.append("email", email);
        if (password !== "")  fd.append("password", password);
        $.ajax({
            url : "http://localhost:8000/api/pengguna/"+lastSegment,
            method: "POST",
            data: fd,
            processData:false,
            contentType:false,
            success: _ =>{
            window.location.href = "http://localhost:8000/usejeq"
            }
        })
    }
</script>

</body>
</html>