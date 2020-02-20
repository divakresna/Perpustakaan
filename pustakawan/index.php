<?php
require_once '../core/init.php';
$peminjam = selectPeminjam($conn);
$buku = selectBook($conn);
pinjamBuku($conn);
updateStok($conn);
logout();
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
            <a href="index.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="container p-4 mt-5">
        <div class="card mx-auto" style="width:50rem;">
            <div class="card-header">Borrowing Form</div>
            <div class="card-body">
                <form method="post">
                    <label>Borrowing Code</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kode_pinjam" placeholder="BR" required>
                    </div>
                    <label>Member Name</label>
                    <select name="id_peminjam" class="form-control">
                        <?php
                        while ($p = mysqli_fetch_assoc($peminjam)) {
                        ?>
                            <option value="<?= $p['id_peminjam'] ?>"><?= $p['nama_peminjam'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Book Title</label>
                    <select name="kode_buku" class="form-control">
                        <?php
                        while ($b = mysqli_fetch_assoc($buku)) {
                        ?>
                            <option value="<?= $b['kode_buku'] ?>"><?= $b['judul_buku'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Date</label>
                    <input type="date" name="tgl_pinjam" class="form-control">
                    <button class="btn btn-warning mt-3" type="submit" name="borrow">Borrow</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../asset/js/jquery.slim.min.js" type="text/javascript"></script>
<script src="../asset/js/popper.js" type="text/javascript"></script>
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>

</html>