<?php
include '../component/sidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>LIST BUKU</h4>
        
        <?php $tanggal = date('y-m-d');
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
        echo date('d', strtotime($tanggal)). ' '. $bulan. ' '. date('Y', strtotime($tanggal));
        ?>
    </div>
    <a href="./createBukuPage.php" class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">TAMBAH BUKU</a>
    <hr>
    <table class="table ">
        <thead>
            <tr>
            <th scope="col">Nama Buku</th>
            <th scope="col">Gambar</th>
            <th scope="col">Jumlah Tersedia</th>
            <?php 
            if($_SESSION['admin'] == 1){
                echo '
                <th scope="col">Peminjam</th>
                <th scope="col">Aksi</th>';
            }else{
                echo '<th scope="col">Pinjam</th>';
            }
            ?>
            
            </tr>

        </thead>
        <tbody>
            <?php
                $query = mysqli_query($con, "SELECT * FROM buku") or
                die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                while($data = mysqli_fetch_assoc($query)){
                    echo'
                        <tr>
                        <td>'.$data['namabuku'].'</td>
                        <td>';?><img src="../gambar/<?php echo $data['gambar'];?>" height="100" width="100"><?php
                        
                        echo '</td>
                        <td>'.$data['jumlahtersedia'].'</td>
                        <td>';
                        if($_SESSION['admin'] == 1){
                            echo '
                            <a href="../page/listDataPeminjamPage.php?id='.$data['id'].'" onClick="return
                            confirm ( \'Are you sure want to delete this data?\')"class="btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="false">Data Peminjam</a></td>
                            <td>
                            <a href="../page/editBukuPage.php?id='.$data['id'].'" onClick="return
                                confirm ( \'Are you sure want to delete this data?\')"class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">EDIT</a>
                            
                            <a href="../process/deleteBukuProcess.php?id='.$data['id'].'" onClick="return
                                confirm ( \'Are you sure want to delete this data?\')"class="btn btn-danger btn-lg" tabindex="-1" role="button" aria-disabled="false">HAPUS</a>
                            </td>
                            ';
                        }else{
                            if($data['jumlahtersedia'] <= 0){
                                echo '<a href="../page/peminjamanPage.php?id='.$data['id'].'" onClick="return
                                confirm ( \'Are you sure want to delete this data?\')"class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">PINJAM</a>';
                            }else{
                                echo '<a href="../page/peminjamanPage.php?id='.$data['id'].'" class="btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="false">PINJAM</a>';
                            }
                        }
                        
                        
                        '</td>
                        </tr>';
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>