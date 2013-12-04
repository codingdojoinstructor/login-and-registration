<?php
session_start();
require_once('connection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
</head>
<body>
	<div>
		<?php
		$query = "SELECT first_name, last_name, email, file_path, birthdate
				  FROM users
				  WHERE id = ".$_GET['id'];
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['id'])
		{
			?>
			<p>Welcome <?= $row['first_name'].' '.$row['last_name'] ?><a href="process.php?logout=1"> Logout</a></p>
			<?php
		}
		?>
		<img width="200" src="<?=$row['file_path'] ?>">
		<h1><?= $row['first_name'].' '.$row['last_name']?></h1>
		<h2><?= $row['email']?></h2>
		<h2><?= date('M d, Y', strtotime($row['birthdate']))?></h2>
	</div>
</body>
</html>