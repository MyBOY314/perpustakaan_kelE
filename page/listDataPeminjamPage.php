<?php
include '../component/userSidebar.php';

$id_buku = $_GET['id'];
$query_buku = mysqli_query($con, "SELECT * FROM buku WHERE id=$id_buku") or
die(mysqli_error($con));
$data_buku = mysqli_fetch_array($query_buku);

$_SESSION['idBuku'] = $id_buku;

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
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-center">
        <h4 >DATA BUKU</h4>
    </div>
    
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Nama Buku
            <span class="badge bg-primary rounded-pill"><?php echo $namabuku ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            jumlah Tersedia
            <span class="badge bg-primary rounded-pill"><?php echo $jumlahtersedia ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <img src="../gambar/<?php echo $gambar;?>" height="50%" width="50%">
        </li>
        
    </ul>
    <hr>
    <h4 class="d-flex justify-content-center">User yang Meminjam</h4>
    <ul>
    <?php
        $query = mysqli_query($con, "SELECT users.name, users.email FROM peminjaman JOIN users 
        on Peminjaman.id_user=users.id where id_buku=$id_buku and status=1") or
        die(mysqli_error($con));

        if (mysqli_num_rows($query) == 0) {
            echo '<tr> <td colspan="7"> Tidak yang meminjam buku ini saat ini </td> </tr>';
        }else{
            $no = 1;
            while($data = mysqli_fetch_assoc($query)){

                echo '
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    '.$data['name'].'
                <span class="badge bg-primary rounded-pill"><?php echo $namabuku ?>'.$data['email'].'</span>
                </li>
                ';
            }
        }
    ?>
    </ul>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>