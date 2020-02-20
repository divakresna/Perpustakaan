<?php
require_once '../../core/init.php';
$select = selectBook($conn);
logout();
editBook($conn);
$kode = $_GET['kode'];
$query = mysqli_query($conn, "SELECT * FROM daftar_buku WHERE kode_buku='$kode'");
$d = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Stock</title>
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-warning">
        <a href="../add_pustakawan.php" class="navbar-brand"><?= $_SESSION['username'] ?></a>
        <a href="add_pustakawan.php" class="nav-item nav-link text-muted">Add Librarian</a>
        <div class="nav-item dropdown">
            <a href="#" class="text-muted nav-link dropdown-toggle" id="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Books
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
                <a href="../add_book.php" class="dropdown-item">Add Books</a>
                <a href="../list_book.php" class="dropdown-item">Books List</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-muted" id="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Stock
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
                <a href="../list_stok.php" class="dropdown-item">Stock List</a>
            </div>
        </div>
        <div class="navbar-nav ml-auto">
            <a href="edit.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <?php

    ?>
    <div class="container p-4 mt-5">
        <div class="card mx-auto" style="width:45rem;">
            <div class="card-header">Add Books Stock</div>
            <div class="card-body">
                <form method="post">
                    <label>Book Code</label>
                    <div class="form-group">
                        <input type="text" value="<?= $d['kode_buku'] ?>" class="form-control" readonly>
                    </div>
                    <label>Book Title</label>
                    <div class="form-group">
                        <input type="text" name="judul" value="<?= $d['judul_buku'] ?>" class="form-control">
                    </div>
                    <label>Writer</label>
                    <div class="form-group">
                        <input type="text" name="pengarang" value="<?= $d['pengarang'] ?>" class="form-control">
                    </div>
                    <label>Category</label>
                    <div class="form-group">
                        <input type="text" name="kategori" value="<?= $d['kategori'] ?>" class="form-control">
                    </div>
                    <label>Rak Number</label>
                    <div class="form-group">
                        <input type="text" name="rak" value="<?= $d['no_rak'] ?>" class="form-control">
                    </div>
                    <label>Qty</label>
                    <div class="form-group">
                        <input type="text" name="jumlah" value="<?= $d['jumlah_buku'] ?>" class="form-control">
                    </div>
                    <button class="btn btn-warning mt-3" type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="../../asset/js/jquery.slim.min.js" type="text/javascript"></script>
<script src="../../asset/js/popper.js" type="text/javascript"></script>
<script src="../../asset/js/bootstrap.min.js" type="text/javascript"></script>

</html>