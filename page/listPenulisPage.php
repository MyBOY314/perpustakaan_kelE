<?php
include '../component/userSidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>LIST PENULIS</h4>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
            <th scope="col">Nama Penulis</th>
            <th scope="col">Profil</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Bio Data</th>
            <?php
            if($_SESSION['admin'] == 1){
                echo '<th scope="col">Aksi</th>';
            }
            ?>
            </tr>

        </thead>
        <tbody>
            <?php
                $id_user = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT id, namaPenulis, fotoProfil, tanggalLahir, bioData FROM penulis") or
                die(mysqli_error($con));

                if($_SESSION['admin'] == 1){
                    echo '
                <a href="./createPenulisPage.php" class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">TAMBAH PENULIS</a>';
                }


                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                while($data = mysqli_fetch_assoc($query)){

                    echo'
                        <tr>
                        <td>'.$data['namaPenulis'].'</td>
                        <td>';?><img src="../gambar/<?php echo $data['fotoProfil'];?>" height="100" width="100"><?php
                        echo '</td>

                        <td>'.$data['tanggalLahir'].'</td>';
                        
                            echo '<td>'.$data['bioData'].'</td>';
                        '</td>
                        </tr>';

                        if($_SESSION['admin'] == 1){
                            echo '
                            <td>
                            <a href="../page/editPenulisPage.php?id='.$data['id'].'" onClick="return
                                confirm ( \'Are you sure want to edit this data?\')"class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">EDIT</a>
                            
                            <a href="../process/deletePenulisProcess.php?id='.$data['id'].'" onClick="return confirm ( \'Are you sure want to delete this data?\')"class="btn btn-danger btn-lg" tabindex="-1" role="button" aria-disabled="false">HAPUS</a>
                            </td>
                            ';
                        }
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