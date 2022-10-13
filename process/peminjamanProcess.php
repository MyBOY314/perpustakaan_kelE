<?php
session_start();
    
    if(isset($_POST['save'])){
        include('../db.php');
        $id_buku = $_SESSION['idBuku'];
        $id_user = $_SESSION['id'];
        $status = 1;
        $tglpengembalian = $_SESSION['tgl_pengembalian_buku'];

        $query_buku = mysqli_query($con, "SELECT * FROM buku WHERE id=$id_buku") or
        die(mysqli_error($con));
        $data_buku = mysqli_fetch_array($query_buku);

        $jumlahbuku = $data_buku['jumlahtersedia'] - 1;

        $query_buku = mysqli_query($con,
            "UPDATE buku SET jumlahtersedia = '$jumlahbuku' WHERE id=$id_buku")
            or die(mysqli_error($con));


        $query = mysqli_query($con,
        "INSERT INTO peminjaman(id_buku, id_user, status, tglpengembalian)
        VALUES
        ('$id_buku', '$id_user', '$status', '$tglpengembalian')")
        or die(mysqli_error($con));

        if($query){
            echo
                '<script>
                window.location = "../page/listPeminjamanPage.php"
                </script>';
                    
        }else{
            echo
                '<script>
                alert("Register Failed [!]");
                </script>';
        }
        
        
    }else{
        echo
            '<script>
            alert("Gagal");
            window.history.back()
            </script>';
    }
?>