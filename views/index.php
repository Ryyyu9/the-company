<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="row h-100 m-0">
        <div class="card w-25 my-auto mx-auto">
            <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center">LOGIN</h1>
            </div>
            <div class="card-body">
                <form action="../actions/login.php" method="POST">
                    <input class="form-control mb-2" type="text" name="username" placeholder="USERNAME" id="username" autofocus required>
                    <input class="form-control mb-2" type="password" name="password" placeholder="PASSWORD" id="password" required>

                    <button type="submit" class="btn btn-primary w-100">Log in</button>
                </form>

                <p class="text-center mt-3 small">
                    <a href="register.php">Creat Account</a>
                </p>
            </div>
        </div>
    </div>
    
</body>
</html>