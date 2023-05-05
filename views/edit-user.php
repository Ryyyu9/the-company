<?php
session_start();

require "../classes/User.php";

$user_obj = new User;
$user_id = $_GET['user'];
$user = $user_obj->getUser($user_id);
// var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <nav class="navbar navbar-expand nav-dark bg-dark mb-5">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand text-white"><h1>The Company</h1></a>
            <div class="navbar-nav">
                <span class="navbar-text text-white"><?= $_SESSION['full_name'];?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center mb-4">EDIT USER</h2>

            <form action="../actions/edit-user.php" method="post" enctype="multipart/form-data">
                <!-- <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <?php
                        if($user['photo']): ?>
                        <img src="../assets/images/<?=$user['photo']; ?>" alt="<?=$user['photo']; ?>" class="d-block mx-auto edit-photo">
                        <?php else: ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                        <?php endif; ?>
                        <input type="file" name="photo" id="photo" calss="form-control mt-2" accept="image/*">
                    </div>
                </div> -->
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <!-- First Name INPUT -->
                    <div class="mb-3">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first-name" class="form-input" value="<?= $user['first_name']; ?>" required autofocus>
                    </div>

                    <!-- Last Name INPUT -->
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last-name" class="form-input" value="<?= $user['last_name']; ?>" required>
                    </div>

                    <!-- Username INPUT -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-input" value="<?= $user['username']; ?>" required>
                    </div>
                    <div class="text-end">
                        <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>