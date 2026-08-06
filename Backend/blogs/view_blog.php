<?php

include __DIR__ . "/../config/db.php";

$sql="SELECT
blogpost.id,
blogpost.title,
blogpost.content,
blogpost.created_at,
blogpost.user_id,
user.username
FROM blogpost
INNER JOIN user
ON blogpost.user_id=user.id
ORDER BY blogpost.created_at DESC";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>

<div class="blog-card">

<h2><?php echo htmlspecialchars($row['title']); ?></h2>

<p>

<?php echo nl2br(htmlspecialchars($row['content'])); ?>

</p>

<div class="blog-info">

Posted by

<strong>

<?php echo htmlspecialchars($row['username']); ?>

</strong>

|

<?php echo $row['created_at']; ?>

</div>

<?php

if($_SESSION['user_id']==$row['user_id']){

?>

<div class="actions">

<a href="../Backend/blogs/edit_blog.php?id=<?php echo $row['id']; ?>">

✏ Edit

</a>

<a href="../Backend/blogs/delete_blog.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this blog?')">

🗑 Delete

</a>

</div>

<?php

}

?>

</div>

<?php

}

?>