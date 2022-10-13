<?php
include '../component/sidebar.php';

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id=$id") or
die(mysqli_error($con));
$data = mysqli_fetch_array($query);

$name = $data['name'];
$email = $data['email'];

?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #0f5a7a; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>SHOW PROFILE</h4>

    </div>
    <div class="d-grid gap-2"> 
        <a class="btn btn-success" style="width: 10%" href="../page/editProfilePage.php" role="button">EDIT</a>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <img src="../gambar/<?php echo $data['image'];?>" height="50%" width="50%">
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <a class="btn btn-success" style="width: 30%" href="../page/editProfilePicturePage.php" role="button">CHANGE PROFILE PICTURE</a>
    </div>
    <table class="table ">
        <form action="../process/loginProcess.php" method="post">
            
            <div class="mb-3">
                <label for="name" class="form-
                label">Name</label>
                <input class="form-control" id="name" name="name"
                aria-describedby="emailHelp" value="<?php echo $name; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-
                label">Email</label>
                <input class="form-control"
                id="email" name="email" value="<?php echo $email; ?>" readonly>
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