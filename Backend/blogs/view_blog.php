<?php

include "../config/db.php";


$sql = "SELECT 
        blogpost.id,
        blogpost.title,
        blogpost.content,
        blogpost.created_at,
        user.username
        FROM blogpost
        INNER JOIN user
        ON blogpost.user_id = user.id
        ORDER BY blogpost.created_at DESC";


$result = mysqli_query($conn, $sql);


if(!$result){

    die("Query Failed: " . mysqli_error($conn));

}


while($row = mysqli_fetch_assoc($result)){

    echo "<h2>" . $row['title'] . "</h2>";

    echo "<p>" . $row['content'] . "</p>";

    echo "<small>
          Posted by: " . $row['username'] . "
          </small>";

    echo "<br>";

    echo "<small>
          Date: " . $row['created_at'] . "
          </small>";

    echo "<hr>";

}


?>