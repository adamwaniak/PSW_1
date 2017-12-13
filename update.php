<?php
if(isset($_POST['update'])){


    if(validate()==true){
        $sesionEmail = $_SESSION['email'];
        $sql = "UPDATE users SET name='$name',lastName='$surname',email='$email',password='$password',country='$country'  WHERE email='$sesionEmail'";
        if(mysqli_query($conn, $sql)){
            echo "Records update successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

}