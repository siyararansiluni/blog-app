<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Create Account</h2>

    <form action="../Backend/auth/register_process.php" method="POST">

        <label>Username</label>
        <input
            type="text"
            name="username"
            required
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            required
        >

        <label>Password</label>
        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Register
        </button>

    </form>

    <p>
        Already have an account?
        <a href="login.php">Login</a>
    </p>

</div>

</body>
</html>