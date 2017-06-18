<?php 
require 'classes/Database.php';

$database = new Database;

$database->query('SELECT * FROM posts WHERE id = :id');
$database->bind(':id', 1);
$rows = $database->resultset();

if($_POST['submit']){
	echo'SUBMITTED, BABY!';
}
?>

<h1>Add Posts</h1>
<form method="post" action="<?php $_SERVER['PHP-SELF'];?>">
	<label for="">Post Title</label><br/>
	<input type="text" name="title" placeholder="Add a Title..." /><br />
	<label for="">Post Body</label><br/>
	<textarea name="body" id="" cols="30" rows="10"></textarea>
	<input type="submit" name="submit" value="Submit"/>
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
