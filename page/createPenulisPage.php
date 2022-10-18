<?php
include '../component/userSidebar.php';
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>TAMBAH PENULIS</h4>
    </div>
    <hr>
    <table class="table ">
        <form action="../process/createPenulisProcess.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="namaPenulis" class="form-
                label">Nama Penulis</label>
                <input class="form-control" id="namaPenulis" name="namaPenulis"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                <input type="file" name="my_image">
             </div>
            
            <div class="mb-3"> 
                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                        <input type='date' class="form-control" id="tanggalLahir" name="tanggalLahir" aria-describedby="emailHelp"> 
                    </div>
            <div class="mb-3">
                <label for="bioData" class="form-
                label">Bio Data</label>
                <input class="form-control" id="bioData" name="bioData"
                aria-describedby="emailHelp">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary"
                name="save">SAVE</button>
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