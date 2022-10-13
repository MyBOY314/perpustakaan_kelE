<?php
    session_start();
    if(isset($_GET['id'])){
        include('../db.php');
        $id_peminjaman = $_GET['id'];
        $status = 0;

        $query = mysqli_query($con,
            "UPDATE peminjaman SET status = '$status' WHERE id=$id_peminjaman")
            or die(mysqli_error($con));

        $query_peminjaman = mysqli_query($con, "SELECT * FROM peminjaman WHERE id=$id_peminjaman") or
            die(mysqli_error($con));

        $data_peminjaman = mysqli_fetch_array($query_peminjaman);

        $id_buku = $data_peminjaman['id_buku'];

        $query_buku = mysqli_query($con, "SELECT * FROM buku WHERE id=$id_buku") or
            die(mysqli_error($con));
        $data_buku = mysqli_fetch_array($query_buku);

        $jumlah = $data_buku['jumlahtersedia'] + 1;

        $query = mysqli_query($con,
        "UPDATE buku SET jumlahtersedia = '$jumlah' WHERE id=$id_buku")
        or die(mysqli_error($con));

        if($query){
            echo
                '<script>
                alert("data berhasil diubah");
                window.location = "../page/listPeminjamanPage.php"
                </script>';
                
        }else{
            echo
                '<script>
                alert("data gagal diubah");
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>