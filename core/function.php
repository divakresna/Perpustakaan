<?php

session_start();
//login
function login($conn)
{
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];

            if ($row['status'] == "admin") {
?>
                <script>
                    alert('Login success!');
                    document.location.href = 'admin/add_pustakawan.php';
                </script>
            <?php

                // header("location:admin/add_pustakawan.php?pesan=berhasil");
            } elseif ($row['status'] == "pustakawan") {
                header("location:pustakawan/index.php?pesan=berhasil");
            } else {
                header("location:index.php?pesan=gagal");
            }
        } else {
            header("location:index.php?pesan=gagal");
        }
    }
}

//add pustakawan
function addPustakawan($conn)
{
    if (isset($_POST['save'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $query = "INSERT INTO user(username,password,status) VALUES ('$username','$password','$status')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            ?>
            <script>
                alert("berhasil");
                window.location.href = 'add_pustakawan.php';
            </script>
        <?php
        }
    }
}

//logout
function logout()
{
    if (isset($_GET['logout'])) {
        session_start();
        session_destroy();
        ?>
            <script>
                alert('Logout success!');
                document.location.href = '../index.php';
            </script>
        <?php
        // header("location:../index.php?pesan=berhasil-logout");
    }
}

//add book
function addBook($conn)
{
    if (isset($_POST['save'])) {
        $kode = $_POST['kode'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $kategori = $_POST['kategori'];
        $rak = $_POST['rak'];
        $jumlah = $_POST['jumlah'];

        $query = "INSERT INTO daftar_buku (kode_buku,judul_buku,pengarang,kategori,no_rak,jumlah_buku) VALUES ('$kode','$judul','$pengarang','$kategori','$rak','$jumlah')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location:add_book.php?pesan=berhasil");
        } else {
            header("location:add_book.php?pesan=gagal");
        }
    }
}

//nampilin data buku untuk form stok
function selectBook($conn)
{
    $query = "SELECT * FROM daftar_buku";
    return mysqli_query($conn, $query);
}



//list pustalkawan
function selectPusta($conn)
{
    $query = "SELECT * FROM user WHERE status='pustakawan'";
    return mysqli_query($conn, $query);
}

// //select stok
// function selectStok($conn)
// {
//     $query = "SELECT * FROM stok_buku s INNER JOIN daftar_buku d on s.kode_buku=d.kode_buku";
//     return mysqli_query($conn, $query);
// }

//update stok -
function updateStok($conn)
{
    $kode = $_POST['kode_buku'];
    $select = mysqli_query($conn, "SELECT * FROM daftar_buku WHERE kode_buku='$kode'");
    $row = $select->fetch_assoc();

    if (isset($_POST['borrow'])) {
        $jumlah = $row['jumlah_buku'];
        $qty = 1;
        $total = $jumlah - $qty;

        $query = "UPDATE daftar_buku SET jumlah_buku='$total' WHERE kode_buku='$kode'";
        $result = mysqli_query($conn, $query);

        // if ($result) {
        // ?>
        //     <script>
        //         alert("Success!");
        //         // window.location.href = '../list_stok.php';
        //     </script>
        // <?php
        // }
    }
}

function updateStock2($conn)
{
    $kode = $_POST['kode_buku'];
    $select = mysqli_query($conn, "SELECT * FROM daftar_buku WHERE kode_buku='$kode'");
    $row = $select->fetch_assoc();

    if (isset($_POST['return'])) {
        $jumlah = $row['jumlah_buku'];
        $qty = 1;
        $total = $jumlah + $qty;

        $query = "UPDATE daftar_buku SET jumlah_buku='$total' WHERE kode_buku='$kode'";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
            <script>
                alert("Success!");
            </script>
        <?php
        }
    }
}


//nampilin peminjam
function selectPeminjam($conn)
{
    $query = "SELECT * FROM peminjam";
    return mysqli_query($conn, $query);
}


//proses pinjam
function pinjamBuku($conn)
{
    if (isset($_POST['borrow'])) {
        $kode = $_POST['kode_pinjam'];
        $id_peminjam = $_POST['id_peminjam'];
        $kode_buku = $_POST['kode_buku'];
        $tgl = $_POST['tgl_pinjam'];
        $id_user = $_SESSION['id_user'];
        $qty = 1;
        $status = "pinjam";

        $query = "INSERT INTO peminjaman(id_peminjaman,id_user,id_peminjam,kode_buku,qty,tanggal_pinjam,status_peminjaman) 
        VALUES('$kode','$id_user','$id_peminjam','$kode_buku','$qty','$tgl','$status')";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
            <script>
                alert('success!');
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('failed!');
            </script>
        <?php
        }
    }
}

//add member
function addMember($conn)
{
    if (isset($_POST['save'])) {
        $id_peminjam = $_POST['id_peminjam'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO peminjam (id_peminjam, nama_peminjam, alamat_peminjam) VALUES ('$id_peminjam','$nama','$alamat')";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
            <script>
                alert("success!");
                window.location.href = 'list_member.php';
            </script>
        <?php
        } else {
            header("location:add_member.php?pesan=gagal");
        }
    }
}

//nampilin data peminjaman
function dataPinjam($conn)
{
    $query = "SELECT * FROM peminjaman p INNER JOIN daftar_buku b ON p.kode_buku=b.kode_buku 
    INNER JOIN peminjam m ON p.id_peminjam=m.id_peminjam";
    return mysqli_query($conn, $query);
}

//update data peminjaman
function returnBuku($conn)
{

    if (isset($_POST['return'])) {
        $id = $_GET['kode'];
        $tgl = $_POST['tgl'];
        $denda = $_POST['denda'];

        // $select = mysqli_query($conn, "SELECT * FROM daftar_buku WHERE kode_buku='$id'");
        // $d = $select->fetch_assoc();
        // $jumlah = $d['jumlah_buku'];
        // $qty = 1;
        // $total = $jumlah + $qty;

        $query = "UPDATE peminjaman SET status_peminjaman='kembali',tanggal_kembali='$tgl',denda='$denda' WHERE id_peminjaman='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
            <script>
                alert("success!");
                window.location.href = 'list_borrow.php'
            </script>
        <?php
        } else {
            header("location:list_borrow.php?pesan=gagal");
        }
    }
}

function deleteBook($conn)
{
    if (isset($_GET['kode'])) {
        $kode = $_GET['kode'];
        $query = "DELETE FROM daftar_buku WHERE kode_buku='$kode'";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
            <script>
                alert("success!");
                window.location.href = 'list_book.php';
            </script>
        <?php
        }
    }
}

function editBook($conn)
{
    if (isset($_POST['update'])) {
        $kode = $_GET['kode'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $kategori = $_POST['kategori'];
        $rak = $_POST['rak'];
        $jumlah = $_POST['jumlah'];


        $query = "UPDATE daftar_buku SET judul_buku='$judul',pengarang='$pengarang',kategori='$kategori',no_rak='$rak',jumlah_buku='$jumlah' WHERE kode_buku='$kode'";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
            <script>
                alert("success!");
                window.location.href = '../list_book.php';
            </script>
<?php
        }
    }
}
