<?php
    session_start();
    
    if(isset($_POST['save'])){
        include('../db.php');
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $id = $_SESSION['id']; 

        $query = mysqli_query($con,
        "UPDATE users SET email = '$email', name = '$name',password = '$password' WHERE id=$id")
        or die(mysqli_error($con));
        
        
        
            

            if($query){
                echo
                    '<script>
                    alert("data berhasil diubah");
                    window.location = "../page/showProfilePage.php"
                    </script>';
                
            }else{
                echo
                    '<script>
                    alert("data gagal diubah");
                    </script>';
            }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>