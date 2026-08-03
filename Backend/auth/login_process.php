<?php

session_start();

require "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Find user by email
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user["password"])) {

            // Create session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            // Redirect to home page
            header("Location: ../../Frontend/index.php");
            exit();

        } else {

            die("Invalid email or password.");

        }

    } else {

        die("Invalid email or password.");

    }

    $stmt->close();
    $conn->close();

}
?>