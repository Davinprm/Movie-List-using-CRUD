<?php 
    session_start();
    include 'conn.php';

    if (isset($_COOKIE['id']) && isset($_COOKIE['key']))//check n set cookie
        {$id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        $result = mysqli_query($conn,"SELECT email, username FROM users WHERE id = $id");//took email based on id
        $row = mysqli_fetch_array($result);
        if ($key === hash('sha256', $row['email'||'username']))//confirm cookie n email
        {$_SESSION['login'] = true;};}

    if (isset($_SESSION["login"])) //start session
        {$_SESSION["username"] = $row["username"];
        header("Location: index.php");
    exit;}

    if (isset($_POST["login"])) 
       {$email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' OR username = '$email' " );

        if (mysqli_num_rows($result) === 1) //email checking how many column that found n if founded have value as "1" n "0" for data not found
           {$row = mysqli_fetch_assoc($result);//password checking. "mysqli_fetch_assoc" to call value on database based on their name by '$row["x"]'
            if (password_verify($password, $row["password"]))
               {$_SESSION["username"] = $row["username"];
                $_SESSION["login"] = true; //set session
                if (isset($_POST['remember']))//remember me checking
                   {setcookie('id', $row['id'], time()+3600);
                    setcookie('key', hash('sha256', $row['username']), time()+3600);}
                    header ("Location: index.php");
                    exit;};}
                    $error = true;}
    $conn->close()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2> 
    
    <form action="" method="post">

        <input type="text" name="email" id="email" required autofocus placeholder="Email"> <br>

        <input type="password" name="password" id="password" required placeholder="Password"> <br>
        <?php if (isset($error)){?>
            <p style="color: red; font-style: italic;">Incorrect Email/Password </p>
        <?php ;}?>

        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>

        <button type="submit" name="login">Login</button>

    </form>
    <p><a href="register.php">Register</a></p>




</body>
</html>

