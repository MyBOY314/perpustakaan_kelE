<?php
include '../component/userSidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>LIST PUBLISHER</h4>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
            <th scope="col">Nama Publisher</th>
            <th scope="col">Logo</th>
            <th scope="col">Tanggal Berdiri</th>
            <th scope="col">Keterangan</th>
            </tr>
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://media.tenor.com/BWJ3hSsw0wkAAAAC/bean-reading.gif" width="30px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">J.K. Rowling</h5>
                <p class="cardtext">“If you don’t like to read, you haven’t found the right book.”</p>
            </div>
        </div>
        </thead>
        <tbody>
            <?php
                $id_user = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT id, namaPublisher, logo, tanggalBerdiri, keterangan FROM publisher") or
                die(mysqli_error($con));

                if($_SESSION['admin'] == 1){
                    echo '
                <a href="./createPublisherPage.php" class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">TAMBAH PUBLISHER</a>';
                }


                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                while($data = mysqli_fetch_assoc($query)){

                    echo'
                        <tr>
                        <td>'.$data['namaPublisher'].'</td>
                        <td>';?><img src="../gambar/<?php echo $data['logo'];?>" height="100" width="100"><?php
                        echo '</td>

                        <td>'.$data['tanggalBerdiri'].'</td>';
                        
                            echo '<td>'.$data['keterangan'].'</td>';
                        '</td>
                        </tr>';

                        if($_SESSION['admin'] == 1){
                            echo '
                            <td>
                            <a href="../page/editPublisherPage.php?id='.$data['id'].'" onClick="return
                                confirm ( \'Are you sure want to edit this data?\')"class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">EDIT</a>
                            
                            <a href="../process/deletePublisherProcess.php?id='.$data['id'].'" onClick="return confirm ( \'Are you sure want to delete this data?\')"class="btn btn-danger btn-lg" tabindex="-1" role="button" aria-disabled="false">HAPUS</a>
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