<?php
include '../component/userSidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>LIST PEMINJAMAN</h4>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
            <th scope="col">Nama Buku</th>
            <th scope="col">Gambar</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal Pengembalian</th>
            <th scope="col">Pengembalian Buku</th>
            </tr>

        </thead>
        <tbody>
            <?php
                $id_user = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT Peminjaman.id, Buku.namabuku, Buku.gambar, Peminjaman.status, Peminjaman.tglpengembalian FROM peminjaman JOIN buku 
                on Peminjaman.id_buku=Buku.id where id_user = $id_user") or
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
                        if($data['status'] == 1){
                            $status = "dipinjam";
                        }else{
                            $status = "Sudah dikembalikan";
                        }
                        echo '</td>
                        <td>'.$status.'</td>
                        <td>'.$data['tglpengembalian'].'</td>
                        <td>';
                        if($data['status'] == 1){
                            echo '<a href="../process/pengembalianBukuProcess.php?id='.$data['id'].'" onClick="return
                            confirm ( \'Are you sure want to delete this data?\')" class="btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="false">KEMBALIKAN</a>';
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