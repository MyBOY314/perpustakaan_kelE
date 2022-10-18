<?php
    session_start();
    
    if(isset($_POST['save']) && $_SESSION['admin'] == 1){
        include('../db.php');
        $namaPublisher = $_POST['namaPublisher'];
        $tanggalBerdiri = $_POST['tanggalBerdiri'];
        $keterangan = $_POST['keterangan'];
        $id = $_SESSION['idPublisher'];

        $query = mysqli_query($con,
        "UPDATE publisher SET namaPublisher = '$namaPublisher', tanggalBerdiri = '$tanggalBerdiri',
        keterangan = '$keterangan' WHERE id=$id")
        or die(mysqli_error($con));
        
            if($query){
                echo
                    '<script>
                    alert("Data berhasil diubah");
                    window.location = "../page/listPublisherPage.php"
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