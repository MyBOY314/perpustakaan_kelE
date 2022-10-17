<?php 
    session_start(); 
    if(isset($_POST['edit_movie'])){ 
        include ('../db.php'); 
        $id = $_SESSION['buku']['id'];
        $namabuku = $_POST['namabuku']; 
        $jumlahtersedia = $_POST['jumlahtersedia']; 
        $gambar = $_POST['gambar']; 

        $queryUpdate = mysqli_query($con, "UPDATE `buku` SET `namabuku`='$namabuku',`jumlahtersedia`='$jumlahtersedia',`gambar`='$gambar'") 
        or die(mysqli_error($con)); 
        
            if($queryUpdate){ 
                echo 
                '<script> 
                    alert("Edit Success"); 
                    window.location = "../page/editBukuPage.php" 
                </script>'; 
            }else{ 
                echo 
                '<script> 
                    alert("Edit Failed"); 
                    window.location = "../page/editBukuPage.php" 
                    </script>'; 
            } 
    }else {
         echo 
         '<script> 
         window.history.back() 
         </script>';
    }
?>