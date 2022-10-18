<?php
    session_start();
    
    if($_SESSION['admin'] == 1){
        include('../db.php');

        //dibawah ini merupakan untuk proses image
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        $id = $_SESSION['idPenulis'];

        if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    
                }else {
                    echo '<script>
                        alert("Hanya Support .jpg .jpeg .png !!!");
                        </script>';
                        $availableCheck += 1;
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
            "UPDATE penulis SET fotoProfil = '$new_img_name' WHERE id=$id")
            or die(mysqli_error($con));

            if($query){
                echo
                    '<script>
                    alert("Foto profil berhasil diubah");
                    window.location = "../page/editPenulisPage.php?id='.$id.'"
                    </script>';
                
            }else{
                echo
                    '<script>
                    alert("Gagal, silahkan coba lagi");
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