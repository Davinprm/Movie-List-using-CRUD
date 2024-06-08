<?php
	session_start();
	if (!isset($_SESSION["login"]))
	{header("Location: login.php");
	 exit;}
     
    require "conn.php";
    $id = $_GET["id"];

    if (del($id) > 0)
    {echo "<script>
        alert('Movie Successfully Deleted');
        document.location.href = 'index.php'
       </script>";}
    else
    {echo "<script>
        alert('Failed Delete Movie');
        document.location.href = 'index.php'
       </script>";}
?>