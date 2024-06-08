<?php 
require 'conn.php';
    if (isset($_POST["signup"])) 
    {if (reg($_POST) > 0)
        {echo "<script>
                alert('Register Successfully');
                document.location.href = 'login.php'
               </script>";}
        else 
        {echo mysqli_error($conn)
        // {echo "<script>
        //         alert('Register Denied');
        //         document.location.href = 'register.php'
        //        </script>
        ;}
    ;}
    $conn->close()
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
</head>
<body>
    <h2>Register Your Account</h2>

    <form action="" method="post">

        <input type="text" name="username" id="username" required autocomplete placeholder="Name"> <br>

        <input type="email" name="email" id="email" required autocomplete placeholder="Email"> <br>

        <input type="password" name="password" id="password" required placeholder="Password"> <br>

        <input type="password" name="password2" id="password2" required placeholder="Password Confirm"> <br>

        <button type="submit" name="signup">Sign Up</button> <br>

    </form>
    <p><a href="login.php">Login</a></p>




</body>
</html>