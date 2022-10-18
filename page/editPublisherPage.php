<?php
include '../component/userSidebar.php';


$id = $_GET['id'];
$_SESSION['idPublisher'] = $id;
$query = mysqli_query($con, "SELECT * FROM publisher WHERE id=$id") or
die(mysqli_error($con));
$data = mysqli_fetch_array($query);

        $namaPublisher = $data['namaPublisher'];
        $logo = $data['logo'];
        $tanggalBerdiri = $data['tanggalBerdiri'];
        $keterangan= $data['keterangan'];
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>EDIT Publisher</h4>
    </div>
    
    <hr>
    <div class="d-flex justify-content-center">
        <img src="../gambar/<?php echo $data['logo'];?>" height="50%" width="50%">
    </div>
    <br>
    <?php 
    echo'
        <div class="d-flex justify-content-center">
            <a href="../page/editPublisherImagePage.php?id='.$data['id'].'" 
            class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">EDIT</a>
        </div>
        '
    ?>
    
    <table class="table ">
        <form action="../process/editPublisherProcess.php" method="post">
        <div class="mb-3">
                <label for="namaPublisher" class="form-
                label">Nama Publisher</label>
                <input class="form-control" id="namaPublisher" name="namaPublisher"
                aria-describedby="emailHelp" value="<?php echo $namaPublisher?>">
            </div>
            
            <div class="mb-3"> 
                        <label for="exampleInputEmail1" class="form-label">Tanggal Berdiri</label>
                        <input type="date" class="form-control" id="tanggalLahir" name="tanggalBerdiri" aria-describedby="emailHelp" value="<?php echo $tanggalBerdiri ?>"> 
                    </div>
            <div class="mb-3">
                <label for="keterangan" class="form-
                label">Keterangan</label>
                <input class="form-control" id="keterangan" name="keterangan"
                aria-describedby="emailHelp" value="<?php echo $keterangan ?>">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary"
                name="save">SAVE</button>
                
            </div>
            <div class="d-grid gap-2">
                <a href="./listPublisherPage.php" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </table>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>