<?php

if(isset($_POST['register'])){

    if(validate()==true){
        $sql = "INSERT INTO users (name,lastName,email,password,country) VALUES('$name','$surname','$email','$password','$country')";
        if(mysqli_query($conn, $sql)){
            echo "Records added successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

}