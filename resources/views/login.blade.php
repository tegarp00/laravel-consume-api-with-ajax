<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

    @if($errors->any())
    <h1 style="color: red;">
        {{ $errors->first() }}
    </h1>
    @endif
    <form action="" method="POST">
        @csrf

        <label for="email">Email : </label>
        <input type="email" placeholder="email" name="email" id="email">


        <label for="password">Password : </label>
        <input type="password" placeholder="password" name="password" id="password">
    
        <button type="submit">Masuk</button>
    </form>
    
</body>
</html>