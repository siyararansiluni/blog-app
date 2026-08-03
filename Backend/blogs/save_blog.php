<?php

session_start();

require "../config/db.php";


// Check user login

if(!isset($_SESSION["user_id"])){

    die("Please login first");

}


// Get form data

$title = trim($_POST["title"]);
$content = trim($_POST["content"]);

$user_id = $_SESSION["user_id"];


// Insert blog

$stmt = $conn->prepare(
"INSERT INTO blogPost(user_id,title,content)
VALUES(?,?,?)"
);


$stmt->bind_param(
"iss",
$user_id,
$title,
$content
);


if($stmt->execute()){

    echo "Blog published successfully";

}
else{

    echo "Error: ".$conn->error;

}


?>