<?php
require_once '../core/init.php';
$id = $_GET['kode'];
$select = dataPinjam($conn);
returnBuku($conn);
updateStock2($conn);
logout();
$query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
$d = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pustakawan Site</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-warning">
        <a href="index.php" class="navbar-brand"><?= $_SESSION['username'] ?></a>
        <div class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link text-muted" id="dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Member
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
                <a href="add_member.php" class="dropdown-item">Add Member</a>
                <a href="list_member.php" class="dropdown-item">List Member</a>
            </div>
        </div>
        <div class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link text-muted" id="dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Borrow
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
                <a href="index.php" class="dropdown-item">New!</a>
                <a href="list_borrow.php" class="dropdown-item">List</a>
            </div>
        </div>
        <div class="ml-auto">
            <a href="update.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="container p-4 mt-5">
        <div class="alert alert-warning mx-auto" role="alert" style="width:45rem;">
            Jika pengembalian telat sehari, maka akan dikenakan denda Rp2.000. Jika lebih dari sehari, maka hari telat dikalikan dengan Rp2000
        </div>
        <div class="card mx-auto" style="width:45rem;">
            <div class="card-header">Book Returning</div>
            <div class="card-body">
                <form method="post">
                    <label>Borrow Code</label>
                    <div class="form-group">
                        <input type="text" value="<?= $d['id_peminjaman'] ?>" class="form-control" readonly>
                    </div>
                    <label>Books Code</label>
                    <div class="form-group">
                        <input type="text" name="kode_buku" value="<?= $d['kode_buku'] ?>" class="form-control" readonly>
                    </div>
                    <label>Borrowing Date</label>
                    <div class="form-group">
                        <input type="text" value="<?= $d['tanggal_pinjam'] ?>" class="form-control" readonly>
                    </div>
                    <label>Returning Date</label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="tgl">
                    </div>
                    <label>Denda</label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="denda">
                    </div>
                    <button class="btn btn-warning mt-3" type="submit" name="return">Return</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../asset/js/jquery.slim.min.js" type="text/javascript"></script>
<script src="../asset/js/popper.js" type="text/javascript"></script>
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>

</html>