<?php
require_once '../core/init.php';
addPustakawan($conn);
logout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Librarian</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-warning">
        <a href="add_pustakawan.php" class="navbar-brand"><?= $_SESSION['username'] ?></a>
        <a href="add_pustakawan.php" class="nav-item nav-link text-muted">Add Librarian</a>
        <div class="nav-item dropdown">
            <a href="#" class="text-muted nav-link dropdown-toggle" id="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Books
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
                <a href="add_book.php" class="dropdown-item">Add Books</a>
                <a href="list_book.php" class="dropdown-item">Books List</a>
            </div>
        </div>
        <div class="navbar-nav ml-auto">
            <a href="add_pustakawan.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="container p-4 mt-5">
        <div class="card mx-auto" style="width:45rem;">
            <div class="card-header">Add New Librarian</div>
            <div class="card-body">
                <form method="post">
                    <label>Username</label>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <label>Password</label>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <label>Hak Akses</label>
                    <select name="status" class="form-control">
                        <option value="admin">Administrator</option>
                        <option value="pustakawan">Pustakawan</option>
                    </select>
                    <button class="btn btn-warning mt-3" type="submit" name="save">Save</button>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="../asset/js/jquery.slim.min.js" type="text/javascript"></script>
<script src="../asset/js/popper.js" type="text/javascript"></script>
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>

</html>