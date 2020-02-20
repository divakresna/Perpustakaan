<?php
require_once 'core/init.php';
$login = login($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="navbar navbar-expand-lg navbar-light bg-warning">
        <a href="login.php" class="navbar-brand">Home</a>
    </div>

    <div class="container p-5 mt-5">
    <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                ?>
                <div class="alert alert-danger mx-auto" style="width:30rem;" role="alert">
                    Login failed!
                </div>
            <?php
            }
        }
        ?>
        <div class="card mx-auto" style="width:30rem;">
            <div class="card-header text-center bg-light">Login Form</div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button class="btn btn-warning btn-block" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="asset/js/jquery.slim.min.js"></script>
<script src="asset/js/popper.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

</html>