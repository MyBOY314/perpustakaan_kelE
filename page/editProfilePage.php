<?php
include '../component/sidebar.php';

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id=$id") or
die(mysqli_error($con));
$data = mysqli_fetch_array($query);

$name = $data['name'];
$email = $data['email'];
$image = $data['image'];
$pass = $data['password'];

?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>EDIT PROFILE</h4>
        <h6><a href="./showProfilePage.php">CANCEL</a></h6>
    </div>
    <hr>
    <table class="table ">
        <form action="../process/editProfileProcess.php" method="post">
        <div class="mb-3">
                <label for="name" class="form-
                label">Name</label>
                <input class="form-control" id="name" name="name"
                aria-describedby="emailHelp" value="<?php echo $name; ?>">
            </div>
            <?php 
                if($_SESSION['admin'] == 0){
                    echo '
                    <div class="mb-3">
                        <label for="email" class="form-
                        label">Email</label>
                        <input class="form-control"
                        id="email" name="email" value="'.$email.'">
                    </div>';
                }else{
                    ?>
                    <div class="mb-3">
                        <label for="email" class="form-
                        label">Email</label>
                        <input class="form-control"
                        id="email" name="email" readonly value="<?php echo $email; ?>">
                    </div>
                    <?php
                }
            ?>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control"
                id="password" name="password" value="$pass">
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