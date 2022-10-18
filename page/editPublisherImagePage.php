<?php
include '../component/userSidebar.php';

if($_SESSION['admin'] == 0){
    echo '<script>
          alert("Anda tidak memiliki aksess !");
          window.location = "../page/listPublisherPage.php"
          </script>';
          
}
$id = $_GET['id'];
$_SESSION['idPublisher'] = $id;
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>Ganti Logo Publisher</h4>
        <h6><a href="./listPublisherPage.php">CANCEL</a></h6>
    </div>
    <hr>
    <table class="table ">
        <form action="../process/editPublisherImageProcess.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="my_image" class="form-label">Logo</label>
                <input type="file" name="my_image">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="save">SAVE</button>
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