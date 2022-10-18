<?php
include '../component/userSidebar.php';


$id = $_GET['id'];
$_SESSION['idPenulis'] = $id;
$query = mysqli_query($con, "SELECT * FROM penulis WHERE id=$id") or
die(mysqli_error($con));
$data = mysqli_fetch_array($query);

        $namaPenulis = $data['namaPenulis'];
        $fotoProfil = $data['fotoProfil'];
        $tanggalLahir = $data['tanggalLahir'];
        $bioData= $data['bioData'];
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>EDIT Penulis</h4>
    </div>
    
    <hr>
    <div class="d-flex justify-content-center">
        <img src="../gambar/<?php echo $data['fotoProfil'];?>" height="50%" width="50%">
    </div>
    <br>
    <?php 
    echo'
        <div class="d-flex justify-content-center">
            <a href="../page/editPenulisImagePage.php?id='.$data['id'].'" 
            class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">EDIT</a>
        </div>
        '
    ?>
    
    <table class="table ">
        <form action="../process/editPenulisProcess.php" method="post">
        <div class="mb-3">
                <label for="namaPenulis" class="form-
                label">Nama Penulis</label>
                <input class="form-control" id="namaPenulis" name="namaPenulis"
                aria-describedby="emailHelp" value="<?php echo $namaPenulis ?>">
            </div>
            
            <div class="mb-3"> 
                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" aria-describedby="emailHelp" value="<?php echo $tanggalLahir ?>"> 
                    </div>
            <div class="mb-3">
                <label for="bioData" class="form-
                label">Bio Data</label>
                <input class="form-control" id="bioData" name="bioData"
                aria-describedby="emailHelp" value="<?php echo $bioData ?>">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary"
                name="save">SAVE</button>
                
            </div>
            <div class="d-grid gap-2">
                <a href="./listPenulisPage.php" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
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