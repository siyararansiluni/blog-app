<?php

session_start();

include "../config/db.php";


if(!isset($_SESSION['user_id'])){

    die("Please login first");

}


$user_id = $_SESSION['user_id'];


if(isset($_GET['id'])){

    $blog_id = $_GET['id'];


    // Check ownership
    $check = "SELECT * FROM blogpost 
              WHERE id='$blog_id' 
              AND user_id='$user_id'";


    $result = mysqli_query($conn,$check);


    if(mysqli_num_rows($result)==0){

        die("You cannot edit this blog");

    }


    $blog = mysqli_fetch_assoc($result);


}



if(isset($_POST['update'])){


    $title = $_POST['title'];

    $content = $_POST['content'];



    $sql = "UPDATE blogpost 
            SET title='$title',
                content='$content'
            WHERE id='$blog_id'
            AND user_id='$user_id'";



    if(mysqli_query($conn,$sql)){

        echo "Blog Updated Successfully";

    }
    else{

        echo "Update Failed";

    }


}


?>


<h2>Edit Blog</h2>


<form method="POST">


<input 
type="text" 
name="title"
value="<?php echo $blog['title']; ?>">


<br><br>


<textarea name="content">

<?php echo $blog['content']; ?>

</textarea>


<br><br>


<button name="update">
Update Blog
</button>


</form>