<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>

<p>You have successfully logged in.</p>

<a href="../Backend/auth/logout.php">Logout</a>

</body>
</html>