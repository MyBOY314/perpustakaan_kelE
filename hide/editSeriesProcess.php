<?php
    session_start();
    
    if(isset($_POST['save'])){
        include('../db.php');
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $realease = $_POST['realease'];
        $episode = $_POST['episode'];
        $season = $_POST['season'];
        $synopsis = $_POST['synopsis'];

        $id = $_SESSION['idSeries'];;
        $query = mysqli_query($con,
            "UPDATE series SET name = '$name', genre = '$genre', realease = '$realease', episode = '$episode', season = '$season', synopsis = '$synopsis' WHERE id=$id")
            or die(mysqli_error($con));

            if($query){
                echo
                    '<script>
                    alert("data berhasil diubah");
                    window.location = "../page/listSeriesPage.php"
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