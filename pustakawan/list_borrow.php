<?php
require_once '../core/init.php';
$list = dataPinjam($conn);
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
            <a href="list_borrow.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="container p-4 mt-5">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th>Borrow Code</th>
                        <th>Member Name</th>
                        <th>Book Title</th>
                        <th>Date</th>
                        <th>Return Date</th>
                        <th>Denda</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($d = mysqli_fetch_assoc($list)) {
                    ?>
                        <tr>
                            <td><?= $d['id_peminjaman'] ?></td>
                            <td><?= $d['nama_peminjam'] ?></td>
                            <td><?= $d['judul_buku'] ?></td>
                            <td><?= $d['tanggal_pinjam'] ?></td>
                            <td>
                                <?php
                                if ($d['tanggal_kembali'] == null) {
                                    echo ("0");
                                } else {
                                ?>
                                    <?= $d['tanggal_kembali'] ?>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($d['denda'] == null) {
                                    echo ("0");
                                } else {
                                ?>
                                    <?= $d['denda'] ?>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($d['status_peminjaman'] == "pinjam") {
                                ?>
                                    <a class="btn btn-sm btn-primary" href="update.php?kode=<?= $d['id_peminjaman'] ?>">
                                        Return
                                    </a>
                                <?php
                                } else {
                                    echo "Returned!";
                                }
                                ?>
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