<?php
require_once '../core/init.php';
addBook($conn);
logout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
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
            <a href="add_book.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="container p-4 mt-5">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "berhasil") {
        ?>
                <div class="alert alert-success mx-auto" style="width:35rem;" role="alert">
                    Book has been add!
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger mx-auto" style="width:35rem;" role="alert">
                    Book cannot be added!
                </div>
        <?php
            }
        }
        ?>
        <div class="card mx-auto" style="width:35rem;">
            <div class="card-header">Add New Books</div>
            <div class="card-body">
                <form method="post">
                    <label>Book Code</label>
                    <div class="form-group">
                        <input type="text" name="kode" class="form-control" required>
                    </div>
                    <label>Book Title</label>
                    <div class="form-group">
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <label>Pengarang</label>
                    <div class="form-group">
                        <input type="text" name="pengarang" class="form-control" required>
                    </div>
                    <label>Category</label>
                    <select name="kategori" class="form-control">
                        <option value="romance">Romance</option>
                        <option value="comedy">Comedy</option>
                        <option value="academic">Academic</option>
                    </select>
                    <label>Rak Number</label>
                    <div class="form-group">
                        <input type="text" name="rak" class="form-control" placeholder="ex:A1" required>
                    </div>
                    <label>Qty</label>
                    <div class="form-group">
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>

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