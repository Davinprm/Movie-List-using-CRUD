<?php
	session_start();
	if (!isset($_SESSION["login"]))
	{header("Location: login.php");
	 exit;}
     
    require 'conn.php';
    if (isset($_POST["submit"])) {
        if (add($_POST) > 0)
        {echo "<script>
                alert('Movie Successfully Added');
                document.location.href = 'index.php'
               </script>
        ";}
        else 
        {echo "<script>
                alert('Please fill all the form correctly');
                document.location.href = 'index.php'
               </script>
        ";};}

    
    //    {header("Location: index.php");
    //     exit;}
    //     else {$error = true;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=form, initial-scale=1.0">
    <title>Add Movie</title>
</head>
<body> 
    <h2>Add Movie</h2>

    <?php //if (isset($error)) { ?>
        <!-- <p style="color: red; font-style: italic">Incorect Username/Password!</p> -->
    <?php //}; ?>

    <form action="" method="post" enctype="multipart/form-data">

        <label for="pic">Movie's Poster: </label> <br>
        <input type="file" accept="image/*" name="pic" id="pic" required> <br>
        
        <label for="name">Movie Name: </label> <!--"for" n "id" attribute on each code is for belong connecting -->
        <input type="text" name="name" id="name" required> <br>
        
        <label for="year">Year Production: </label> 
        <input type="number" name="year" id="year" min="4" required> <br>
        
        <label for="directed">Directed by: </label> 
        <input type="text" name="directed" id="directed" required> <br>
        
        <label for="quote">Quote: </label> 
        <input type="text" name="quote" id="quote" required> <br>
        
        <button type="submit" name="submit">Add</button>

        <a href="index.php">Back</a>
        
    </form>

</body>
</html>