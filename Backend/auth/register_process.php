<?php

require "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {

        die("Email already registered.");

    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $conn->prepare(
        "INSERT INTO user(username,email,password)
         VALUES(?,?,?)"
    );

    $stmt->bind_param(
        "sss",
        $username,
        $email,
        $hashedPassword
    );

    if ($stmt->execute()) {

        echo "Registration Successful!";

    } else {

        echo "Registration Failed.";

    }

}
?>