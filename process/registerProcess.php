<?php
    
    if(isset($_POST['register'])){
        include('../db.php');
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
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
                        alert("Hanya SUpport .jpg .jpeg .png !!!");
                        </script>';
                        $availableCheck += 1;
                }
        }else {
            $em = "unknown error occurred!";
            header("Location: index.php?error=$em");
        }

        $findEmail = mysqli_query($con, "SELECT * FROM users WHERE email='$email'") or
            die(mysqli_error($con));

        if (mysqli_num_rows($findEmail) != 0) {
            echo '<script>
            alert("Email tidak tersedia [!]");
            </script>';
            $availableCheck += 1;
        }

        if($availableCheck != 0){
            echo
            '<script>
                alert("Register Failed [!]");
                window.location = "../page/registerPage.php"
            </script>';
        }else{
            //untuk prosses Image
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = '../gambar/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);
				
            //untuk bukan image
            $query = mysqli_query($con,
            "INSERT INTO users(email, password, name, image, adminstatus)
            VALUES
            ('$email', '$password', '$name', '$new_img_name', '0')")
            or die(mysqli_error($con));

            if($query){
                echo
                    '<script>
                    alert("Register Success!!");
                    window.location = "../index.php"
                    </script>';
                
            }else{
                echo
                    '<script>
                    alert("Register Failed [!]");
                    </script>';
            }
        }

        
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>