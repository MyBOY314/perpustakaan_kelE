<?php
    session_start();
        if(isset($_GET['id']) && $_SESSION['admin'] == 1){
            include ('../db.php');
            $id = $_GET['id'];

            $query = mysqli_query($con, "SELECT * FROM penulis where id=$id") or
                die(mysqli_error($con));

                if (mysqli_num_rows($query) > 0) {
                    $queryDelete = mysqli_query($con, "DELETE FROM penulis WHERE id='$id'") or
                    die(mysqli_error($con));
                    if($queryDelete){
                        echo
                            '<script>
                            alert("Delete Success!!"); window.location = "../page/listPenulisPage.php"
                            </script>';
                    }else{
                        echo
                            '<script>
                            alert("Delete Failed [!]"); window.location = "../page/listPenulisPage.php"
                            </script>';
                    }
                }else{
                    echo '<script>
                            alert("Kesalahan !"); window.location = "../page/listPenulisPage.php"
                        </script>';
                }
            
        }else {
            echo
                '<script>
                window.history.back()
                </script>';
    }
?>