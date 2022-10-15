<?php
include '../component/sidebar.php';

$id_user = $_SESSION['id'];
$id_buku = $_GET['id'];
$query_user = mysqli_query($con , "SELECT * FROM users WHERE id=$id_user") or
die(mysqli_error($con));
$data_user = mysqli_fetch_array($query_user);

$query_buku = mysqli_query($con, "SELECT * FROM buku WHERE id=$id_buku") or
die(mysqli_error($con));
$data_buku = mysqli_fetch_array($query_buku);

$_SESSION['idBuku'] = $id_buku;
$_SESSION['verifikasi_peminjaman_process'] = 1;


$name = $data_user['name'];
$email = $data_user['email'];
$namabuku = $data_buku['namabuku'];
$gambar = $data_buku['gambar'];
$jumlahtersedia = $data_buku['jumlahtersedia'];
        $tanggal = date('y-m-d');
        switch (date('m', strtotime($tanggal))) {
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;
            
            default:
                $bulan = 'Tidak diketahui';
                break;
        }
        $tanggal_pengembalian = date('y-m-d', strtotime('+7 days', strtotime($tanggal)));
        
        $_SESSION['tgl_pengembalian_buku'] = $tanggal_pengembalian;
?>
<link href="style.css" rel="stylesheet">


<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>KONFIRMASI PEMINJAMAN</h4>
        <h6><a href="./showProfilePage.php">CANCEL</a></h6>
    </div>
    
    <ul class="list-group ">
        <li class="list-group-item d-flex justify-content-between align-items-center" >
            Nama Peminjam
            <span class="badge bg-primary rounded-pill"><?php echo $name ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" >
            Email Peminjam
            <span class="badge bg-primary rounded-pill"><?php echo $email ?></span>
        </li>
    </ul>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <img src="../gambar/<?php echo $gambar;?>" class="rounded mx-auto d-block" height="20%" width="20%">
        </li>
        <li class="list-group-item d-flex justify-content-center">
            <span class="badge bg-primary rounded-pill"><?php echo $namabuku ?></span>
        </li>
    </ul>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item d-flex justify-content-between align-items-center" style="width:621px">
            Tanggal Peminjaman
            <span class="badge bg-primary rounded-pill"><?php echo date('d', strtotime($tanggal)). ' '. $bulan. ' '. date('Y', strtotime($tanggal)); ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="width:621px">
            Tanggal Pengembalian Maximal
            <span class="badge bg-primary rounded-pill"><?php echo date('d', strtotime($tanggal_pengembalian)). ' '. $bulan. ' '. date('Y', strtotime($tanggal_pengembalian)); ?></span>
        </li>
    </ul>
    <hr>
    <form action="../process/peminjamanProcess.php" method="post">
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary"
                name="save">SAVE</button>
        </div>
        <div class="d-grid gap-2">
        <a href="./dashboardPage.php" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        </div>
    </form>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>