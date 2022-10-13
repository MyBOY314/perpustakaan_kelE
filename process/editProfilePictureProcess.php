<?php
    session_start();
    
    if($_SESSION['isLogin'] = true){
        include('../db.php');
        $availableCheck = 0;

        //dibawah ini merupakan untuk proses image
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        $id = $_SESSION['id'];

        if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    
                }else {
                    echo '<script>
                        alert("Hanya SUpport .jpg .jpeg .png !!!");
                        </script>';
                        $availableCheck += 1;
                }
        }else {
            $em = "unknown error occurred!";
            header("Location: index.php?error=$em");
        }


        if($availableCheck != 0){
            echo
            '<script>
                alert("Register Failed");
                window.location = "../page/registerPage.php"
            </script>';
        }else{
            //untuk prosses Image
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = '../gambar/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);
				
            //untuk bukan image

            $query = mysqli_query($con,
            "UPDATE users SET image = '$new_img_name' WHERE id=$id")
            or die(mysqli_error($con));

            if($query){
                echo
                    '<script>
                    alert("berhasil ganti Profile Picture");
                    window.location = "../page/showProfilePage.php"
                    </script>';
                
            }else{
                echo
                    '<script>
                    alert("Gagal, silahkan coba lagi");
                    </script>';
            }
        }

        
    }else{
        echo
            '<script>
            alert("Action Failed");
            window.history.back()
            </script>';
    }
?>