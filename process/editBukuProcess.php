<?php
    session_start();
    
    if(isset($_POST['save']) && $_SESSION['admin'] == 1){
        include('../db.php');
        $namabuku = $_POST['namabuku'];
        $jumlahtersedia = $_POST['jumlahtersedia'];
        $id = $_SESSION['idBuku'];

        $query = mysqli_query($con,
        "UPDATE buku SET namabuku = '$namabuku', jumlahtersedia = '$jumlahtersedia' WHERE id=$id")
        or die(mysqli_error($con));
        
            if($query){
                echo
                    '<script>
                    alert("data berhasil diubah");
                    window.location = "../page/dashboardPage.php"
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
            alert("Anda tidak memiliki aksess");
            window.history.back()
            </script>';
    }
?>