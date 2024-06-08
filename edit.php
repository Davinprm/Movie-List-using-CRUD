<?php
	session_start();
	if (!isset($_SESSION["login"]))
	{header("Location: login.php");
	 exit;}
     
    require 'conn.php';
    if (isset($_POST["submit"])) {
        if (edit($_POST) > 0)
        {echo "<script>
                alert('Movie Successfully Edited');
                document.location.href = 'index.php'
               </script>
        ";};}
        
    $id = $_GET["id"];
    $mv = query("SELECT *FROM movies WHERE id = $id")[0]; //"[0]" is to choose row table index
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=form, initial-scale=1.0">
    <title>Edit Movie</title>
    <style>
		#moviesposter
		{width: 50px;
		height: 80px;}
	</style>
</head>
<body> 
    <h2>Edit Movie</h2>

    <?php //if (isset($error)) { ?>
        <!-- <p style="color: red; font-style: italic">Incorect Username/Password!</p> -->
    <?php //}; ?>

    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" id="id" value="<?= $mv["id"]; ?>">
        <input type="hidden" name="prevpic" value="<?= $mv["pic"]; ?>">


        <label for="pic">Movie's Poster: </label> <br>

        <img id="moviesposter" src="img/<?= $mv["pic"]; ?>" alt="Movie's Poster"> <br>

        
        <input type="file" accept="image/*" name="pic" id="pic"> <br>
        
        <label for="name">Movie Name: </label> <!--"for" n "id" attribute on each code is for belong connecting -->
        <input type="text" name="name" id="name" required value="<?= $mv["name"]; ?>"> <br>
        
        <label for="year">Year Production: </label> 
        <input type="number" name="year" id="year" min="4" required value="<?= $mv["year"]; ?>"> <br>
        
        <label for="directed">Directed by: </label> 
        <input type="text" name="directed" id="directed" required value="<?= $mv["directed"]; ?>"> <br>
        
        <label for="quote">Quote: </label> 
        <input type="text" name="quote" id="quote" required value="<?= $mv["quote"]; ?>"> <br>
        
        <button type="submit" name="submit">Edit</button>

        <a href="index.php">Back</a>
        
    </form>

</body>
</html>