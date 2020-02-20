<?php
require_once '../core/init.php';
$list = selectBook($conn);
deleteBook($conn);
logout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books List</title>
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
            <a href="list_book.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="container mt-5 p-4">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Books Code</th>
                        <th>Books Title</th>
                        <th>Writer</th>
                        <th>Category</th>
                        <th>Rak Number</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($d = mysqli_fetch_assoc($list)) {
                    ?>
                        <tr>
                            <td><?= $d['kode_buku'] ?></td>
                            <td><?= $d['judul_buku'] ?></td>
                            <td><?= $d['pengarang'] ?></td>
                            <td><?= $d['kategori'] ?></td>
                            <td><?= $d['no_rak'] ?></td>
                            <td><?= $d['jumlah_buku'] ?></td>
                            <td>
                                <a href="list_book.php?kode=<?= $d['kode_buku'] ?>" class="btn btn-danger btn-sm" type="submit">Delete</a>
                                <a href="proses/edit.php?kode=<?= $d['kode_buku'] ?>" class="btn btn-primary btn-sm" type="submit">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
<script src="../asset/js/jquery.slim.min.js" type="text/javascript"></script>
<script src="../asset/js/popper.js" type="text/javascript"></script>
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>

</html>