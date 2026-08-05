<?php

session_start();

include "../config/db.php";


if(!isset($_SESSION['user_id'])){

    die("Please login first");

}


$user_id = $_SESSION['user_id'];



if(isset($_GET['id'])){


    $blog_id = $_GET['id'];



    // Check ownership first

    $check = "SELECT * FROM blogpost
              WHERE id='$blog_id'
              AND user_id='$user_id'";


    $result = mysqli_query($conn,$check);



    if(mysqli_num_rows($result)==0){

        die("You cannot delete this blog");

    }



    // Delete blog

    $delete = "DELETE FROM blogpost
               WHERE id='$blog_id'
               AND user_id='$user_id'";



    if(mysqli_query($conn,$delete)){


        echo "Blog Deleted Successfully";


    }
    else{


        echo "Delete Failed";


    }


}


?>