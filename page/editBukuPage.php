<?php
include '../component/adminSidebar.php';

if($_SESSION['admin'] == 0){
    echo '<script>
          alert("Hanya SUpport .jpg .jpeg .png !!!");
          window.location = "../page/dashboardPage.php"
          </script>';
          
}

$id = $_GET['id'];
$_SESSION['idBuku'] = $id;
$query = mysqli_query($con, "SELECT * FROM buku WHERE id=$id") or
die(mysqli_error($con));
$data = mysqli_fetch_array($query);

$namabuku = $data['namabuku'];
$gambar = $data['gambar'];
$jumlahtersedia = $data['jumlahtersedia'];
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>EDIT BUKU</h4>
    </div>
    
    <hr>
    <div class="d-flex justify-content-center">
        <img src="../gambar/<?php echo $data['gambar'];?>" height="50%" width="50%">
    </div>
    <br>
    <?php 
    echo'
        <div class="d-flex justify-content-center">
            <a href="../page/editBukuImagePage.php?id='.$data['id'].'" onClick="return
            confirm ( \'Are you sure want to delete this data?\')"class="btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="false">EDIT</a>
        </div>
        '
    ?>
    
    <table class="table ">
        <form action="../process/editBukuProcess.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-
                label">Judul Buku</label>
                <input class="form-control" id="name" name="name"
                aria-describedby="emailHelp" value="<?php echo $namabuku; ?>">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-
                label">Jumlah Buku</label>
                <input class="form-control"
                id="genre" name="genre" value="<?php echo $jumlahtersedia; ?>">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary"
                name="save">SAVE</button>
                
            </div>
            <div class="d-grid gap-2">
                <a href="./dashboardPage.php" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
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