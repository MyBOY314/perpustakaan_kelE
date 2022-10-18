<?php
    session_start();
    
    if(isset($_POST['save']) && $_SESSION['admin'] == 1){
        include('../db.php');
        $namaPenulis = $_POST['namaPenulis'];
        $fotoProfil = $_POST['fotoProfil'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $bioData= $_POST['bioData'];
        $id = $_SESSION['idPenulis'];

        $query = mysqli_query($con,
        "UPDATE penulis SET namaPenulis = '$namaPenulis', fotoProfil = '$fotoProfil' , tanggalLahir = '$tanggalLahir',
        bioData = '$bioData' WHERE id=$id")
        or die(mysqli_error($con));
        
            if($query){
                echo
                    '<script>
                    alert("Data berhasil diubah");
                    window.location = "../page/listPenulisPage.php"
                    </script>';
                
            }else{
                echo
                    '<script>
                    alert("Data gagal diubah");
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