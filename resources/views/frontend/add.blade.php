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
        <input type="text" class="form-control" id="nama" ><br><br>
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" ><br><br>
        <label for="nama" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" >

        <button onclick="add()" id="submit">Simpan</button>
    </div>


<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>

    add = () => {
        let nama = $("#nama").val()
        let email = $("#email").val()
        let password = $("#password").val()
    
        if(nama == "") return alert("Nama tidak boleh kosong")
        if(email == "") return alert("Email tidak boleh kosong")
        if(password == "") return alert("Password tidak boleh kosong")

        let formData = new FormData();

        formData.append("nama", nama)
        formData.append("email", email)
        formData.append("password", password)

        $.ajax({
            url: "http://localhost:8000/api/pengguna",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: _ => {
                window.location.href = "http://localhost:8000/usejeq"
            }
        })
    }

</script>

</body>
</html>