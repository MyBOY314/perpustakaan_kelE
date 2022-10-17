<?php
    session_start(); 
    if(isset($_POST['save'])  && $_SESSION['admin'] == 1){
        include('../db.php');
        $namabuku = $_POST['judulbuku'];
        $jumlahtersedia = $_POST['jumlahbuku'];
        $availableCheck = 0;

        //dibawah ini merupakan untuk proses image
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    
                }else {
                    echo '<script>
                        alert("Hanya Support .jpg .jpeg .png !!!");
                        </script>';
                }
        }else {
            $em = "unknown error occurred!";
            header("Location: index.php?error=$em");
        }
        //untuk prosses Image
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
		$img_upload_path = '../gambar/'.$new_img_name;
		move_uploaded_file($tmp_name, $img_upload_path);
				
        //untuk bukan image
        $query = mysqli_query($con,
        "INSERT INTO buku(namabuku, jumlahtersedia, gambar)
        VALUES
        ('$namabuku', '$jumlahtersedia','$new_img_name')") 
        or die(mysqli_error($con));

        if($query){
            echo
                '<script>
                alert("Tambah Buku Success");
                window.location = "../page/dashboardPage.php"
                </script>';
                
        }else{
            echo
                '<script>
                alert("Tambah Buku Failed");
                </script>';
            }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>