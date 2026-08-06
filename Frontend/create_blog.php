<!DOCTYPE html>
<html>
<head>
<title>Create Blog</title>
</head>

<body>

<h2>Create New Blog</h2>

<form action="../backend/blogs/create_blog.php" method="POST">

<input 
type="text" 
name="title" 
placeholder="Blog Title"
required>


<br><br>


<textarea 
name="content"
placeholder="Write your blog..."
required></textarea>


<br><br>


<button type="submit">
Publish
</button>

</form>


</body>
</html>