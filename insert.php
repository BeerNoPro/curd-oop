<?php 
    include 'database.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $message = $_POST['message'];
        $date = date("Y-m-d h:i:s A");

        // handle upload file image
        $file = $_FILES['image'];
        $avatar = $file["name"];
        $targer_dir = "images/" . $avatar;
        if (move_uploaded_file($file["tmp_name"], $targer_dir)) {
            $a = new database();
            $a->insert('data',['name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,'message'=>$message, 'avatar'=>$avatar,'created'=>$date,'updated'=>$not]);
            if ($a == true) {
                header('location:index.php');
            }
        }   

    }
?>