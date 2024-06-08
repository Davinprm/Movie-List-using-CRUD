<?php 
	session_start();
	if (!isset($_SESSION["login"]))
	   {header("Location: login.php");
	exit;};
	include 'conn.php'; //connect this page to connection function (conn.php) using "require 'x';" function
	
	//pagination n configuration
	$pagpage = 3;
	$activepage = (isset($_GET["page"])) ? $_GET["page"] : 1;
	$firstdata = ($pagpage * $activepage) - $pagpage;

	$data = count(query("SELECT * FROM movies")); //took all data number using "count" function
	$pagetotal = ceil($data / $pagpage); //took round fraction up number to determine how many page

	//took d data from movie's table/query movie data
	//call d fucntion with each field on database table that already prepared on 'space fill with column'
	$movies = query("SELECT * FROM movies LIMIT $firstdata, $pagpage"); //"LIMIT" is for determine how many data displayed on table by first param is for data index number starts from n second param is for how many data showed
	//"SELECT * FORM movies" to show d table's value
	//"ORDER BY id DESC(high to low id)/ASC (low to high id)"

	if (isset($_POST["search"])) 
	{$movies = search($_POST["keyword"]);}
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movie List</title>
	<style>
		#moviesposter
		{width: 50px;
		height: 80px;}

		.loading 
		   {width: 100px;
			position: absolute;
			top: 75px;
			left: 159px;
			z-index: -1; /*layering element to put under d others */
			display: none;}
	</style>
</head>

<body>
	<h2><a href="index.php">Movie List</a></h2>

	<a href="insert.php">Add Movie</a> <br><br>
	
	<form action="" method="post"> <!--id below to link on Ajax Live Search method-->
		<input type="text" name="keyword" placeholder="Search Movie" autocomplete="off" id="keyword">
		<button type="submit" name="search" id="search-button">Search</button>
		<img src="img/loadinggif.gif" alt="loading animation" class="loading">
	</form>
	<br>

	 <div id="container"> <!--make container ID for ajax Live Search method to execute specific element-->
		<table border="1" cellpadding="10" cellspacing="0">

			<tr>
				<th>Poster</th>
				<th>Movie</th>
				<th>Year Production</th>
				<th>Directed</th>
				<th>Quote</th>
				<th>Setting</th>
			</tr>

			<?php foreach ($movies as $column) {?> <!--call column's lement-->
			<tr> <!--call every element from databse table using var with string-->
				<td> 
					<img id="moviesposter" src="img/<?= $column["pic"];?>" alt="Movie's Poster" title="Movie's Poster"></img>
				</td>
				<td> <?= $column["name"]; ?> </td>
				<td> <?= $column["year"]; ?> </td>
				<td> <?= $column["directed"]; ?> </td>
				<td> <?= $column["quote"]; ?> </td>
				
				<td><!-- send primary key first to select wich column to execute -->
					<a href="edit.php?id= <?= $column['id']; ?> ">Edit</a> or 
					<a href="del.php?id= <?= $column['id']; ?> " onclick="return confirm('Do you want to delete this Movie?');">Delete</a>
				</td>
			</tr>
			<?php ; } ?>
		</table>
	</div> <br>

    <script src="ajax/jquery/jquery-3.7.1.min.js"></script> <!--jquery script have to put under d script that will be used -->
	<script src="ajax/jquery/livesearch.js"></script> <!--if using js, must put above closing body tag -->

	<!-- navigation -->
	<?php if ($activepage > 1) {?>
		<a href="?page=<?= $activepage - 1 ?>"> &laquo </a>
	<?php ;}?>
		<?php for ($i = 1; $i <= $pagetotal ; $i++) {?>
			<?php if ($i == $activepage) {?>
				<a href="?page=<?= $i ?>" style="font-weight: bold; color: darkblue;"><?= $i; ?></a>
			<?php ;} else {?>
				<a href="?page=<?= $i ?>" style="color: steelblue;"><?= $i; ?>
			<?php ;}?>
		<?php ;} ?>
	<?php if ($pagetotal > $activepage) {?>
		<a href="?page=<?= $activepage + 1 ?>"> &raquo </a>
	<?php ;}?>

	<br><br>
	<a href="logout.php">Logout</a>

</body>
</html>