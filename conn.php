<?php 
    //make connection mySQL n save it to var
    $conn = mysqli_connect("localhost", "root", "", "movie");
    /*if (!$result) 
		{echo mysqli_error($conn);}*/ //to checking error 

	// while ($show = mysqli_fetch_assoc($result))
	// {var_dump($show["name"]);}

    function query($query) //make a function call "query"
        {global $conn; //"global" is for search var outside (above)
        $result = mysqli_query($conn, $query); //took d data by connection function above
        $field = []; //make a space for column in database table
        while ($column = mysqli_fetch_assoc($result)) //show column on database table
            {$field[] = $column;} //put column's table to 'space'
        return $field;} //show d space fill with column

    function add($add)
        {global $conn;
        //took d data by each element inside form
        //upload pic
        $pic = upload (); //save every value on form to var to make inserting value to mySQL more easily
        $name = htmlspecialchars($add["name"]); //function beside to prevent user for filling d form by HTML tag that could cause hacked
        $year = htmlspecialchars($add["year"]);
        $directed = htmlspecialchars($add["directed"]);
        $quote =htmlspecialchars($add["quote"]);
        
        //make var for shorter code below
        $query = "INSERT INTO movies 
                  VALUES ('$pic', '$name', '$year', '$directed', '$quote', '')";

        //inserting result of form to database using "INSERT INTO x VALUES ('','')" on second element after connection var using mysqli_query wich x is d name of d table database
        mysqli_query($conn, $query);

        //function below to check there's a change, add, or delete by change or add will give "1" n "-1" for error as $conn as parameter
        return mysqli_affected_rows($conn);}
        
    function upload()
        {$filename = $_FILES['pic']['name'];
        $tmpname = $_FILES['pic']['tmp_name'];
        $format = pathinfo($filename, PATHINFO_EXTENSION); //"pathinfoextension" for saving file extension.

        $filename = uniqid();
        $filename .= ".";
        $filename .= $format;

        move_uploaded_file($tmpname, 'img/' . $filename);
        return $filename;}
        
    function del($del)
        {global $conn;
        mysqli_query($conn,"DELETE FROM movies WHERE id = $del");
        return mysqli_affected_rows($conn);}

    function edit($add)
        {global $conn;
        //took d data by each element inside form
        //save every value on form to var to make inserting value to mySQL more easily
        $id = $add["id"];
        $prevpic = htmlspecialchars($add["prevpic"]);

        if ($_FILES['pic']['error'] === 4) 
        {$pic = $prevpic;}
        else {$pic = upload ();}

        $name = htmlspecialchars($add["name"]); //function beside to prevent user for filling d form by HTML tag that could cause hacked
        $year = htmlspecialchars($add["year"]);
        $directed = htmlspecialchars($add["directed"]);
        $quote =htmlspecialchars($add["quote"]);

        //make var for shorter code below
        $query = "UPDATE movies SET 
        pic = '$pic',
        name = '$name',
        year = '$year',
        directed = '$directed',
        quote = '$quote'
        WHERE id = $id";

        //inserting result of form to database using "INSERT INTO x VALUES ('','')" on second element after connection var using mysqli_query wich x is d name of d table database
        mysqli_query($conn, $query);

        //function below to check there's a change, add, or delete by change or add will give "1" n "-1" for error as $conn as parameter
        return mysqli_affected_rows($conn);}


    function search($keyword)
        {$query = "SELECT * FROM movies WHERE 
                   name LIKE '%$keyword%' OR
                   year LIKE '%$keyword%' OR
                   directed LIKE '%$keyword%'"; //"LIKE" n then put d element between "%" to search similiar words
         return query($query);}

    function reg($add)
        {global $conn;
        $username = stripslashes($add["username"]); //"stripslashes" for unacceptable character slash "/" n "strtolower" to force every character into small wording
        $email = strtolower(stripslashes($add["email"]));
        $password = mysqli_real_escape_string($conn, $add["password"]); //to
        $password2 = mysqli_real_escape_string($conn, $add["password2"]); //to

        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' AND email = '$email'"); //checking for double used username denied
        if (mysqli_fetch_assoc($result))
        {echo "<script>
            alert('Username or Email is Already Used');
            </script>";
        return false;}


        if ($password !== $password2) //confirmation checking password
        {echo "<script>
                alert('Incorect Password');
                </script>";
        return false;}

        $password = password_hash($password, PASSWORD_DEFAULT);//encrypted password

        mysqli_query($conn,"INSERT INTO users 
        VALUES('', '$username', '$email', '$password')");

        return mysqli_affected_rows($conn);}
?>