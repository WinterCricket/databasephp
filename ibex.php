<?php 
require 'classes/Database.php';

$database = new Database;



$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if($post['submit']){
	$id = $post['id'];
	$title = $post['title'];
	$body = $post['body'];

	$database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->bind(':id', $id);
	$database->execute();
}

$database->query('SELECT * FROM posts');
$rows = $database->resultset();
?>

<h1>Add Posts</h1>
<form method="post" action="<?php $_SERVER['PHP-SELF'];?>">
	<label for="">Post ID</label><br/>
	<input type="number" name="id" placeholder="Add an id number..." /><br />
	<label for="">Post Title</label><br/>
	<input type="text" name="title" placeholder="Add a title..." /><br /><br />
	<label for="">Post Body</label><br/>
	<textarea name="body" id="" cols="" rows=""></textarea>
	<input type="submit" name="submit" value="Submit" />
	 
</form>
<h1>Posts</h1>
<div>
	<?php foreach($rows as $row) : ?>
		<div>
			<h2><?php echo $row['id'];?></h2>
			<h3><?php echo $row['title'];?>
			</h3>
			<p> <?php echo $row['body']; ?> <p>
		</div>

	<?php endforeach; ?>
</div>
