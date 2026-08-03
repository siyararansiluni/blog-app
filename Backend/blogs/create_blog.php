<?php

session_start();

include "../config/db.php";


if(!isset($_SESSION['user_id'])){

    die("Please login first");

}


$title = $_POST['title'];
$content = $_POST['content'];

$user_id = $_SESSION['user_id'];



$sql = "INSERT INTO blogPost
(title,content,user_id)
VALUES
('$title','$content','$user_id')";



if(mysqli_query($conn,$sql)){

    echo "Blog Created Successfully";

}
else{

    echo "Error: ".mysqli_error($conn);

}


?>