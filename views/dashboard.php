<?php
session_start();

require "../classes/User.php";

$user = new User;

$all_users = $user->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
                <a href="profile.php" class="nav-link"><span class="navbar-text text-white"><?= $_SESSION['full_name'];?></span></a>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
            </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">USER LIST</h2>

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th><!-- reserve for the photo --></th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th><!-- Reserved for the action button --></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($user = $all_users->fetch_assoc()){
                    ?>
                        <tr>
                            <td>
                                <?php
                                if($user['photo']){ // "" in php - empty string is equal to false
                                ?>
                                    <img src="../assets/images/<?= $user['photo']; ?>" alt="<?= $user['photo']; ?>" class="d-block mx-auto dashboard-photo">
                                <?php
                                }else{
                                ?>
                                <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['first_name']; ?></td>
                            <td><?= $user['last_name']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td>
                                <?php
                                    // if($_SESSION['id'] == $user['id']){
                                ?>
                                    <a href="edit-user.php?user=<?= $user['id']; ?>" class="btn btn-outline-warning">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete-user.php?user=<?= $user['id']; ?>" class="btn btn-outline-danger">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                <?php
                                    // }
                                ?>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>