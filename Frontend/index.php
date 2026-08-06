<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Blog Application</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<div class="logo">
📝 BlogHub
</div>

<div class="nav-links">

<a href="index.php">Home</a>

<a href="create_blog.php">Create Blog</a>

<a href="../Backend/auth/logout.php">Logout</a>

</div>

</div>


<div class="container">

<div class="welcome">

Welcome,
<strong><?php echo $_SESSION['username']; ?></strong> 👋

</div>

<?php

include("../Backend/blogs/view_blog.php");

?>

</div>

</body>

</html>