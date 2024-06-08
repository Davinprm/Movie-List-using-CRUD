<?php 
    // sleep(1)
    usleep(500000); //1 juta for one second
    require '../conn.php';
    $keyword = $_GET["keyword"]; //took d user's value that has been send by ajax/jquery n return d specific value to user
    $query = "SELECT * FROM movies WHERE 
              name LIKE '%$keyword%' OR
              year LIKE '%$keyword%' OR
              directed LIKE '%$keyword%'";
    $movies = query($query);
?>
    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>Poster</th>
        <th>Movie</th>
        <th>Year Production</th>
        <th>Directed</th>
        <th>Quote</th>
        <th>Setting</th>
    </tr>

    <?php foreach ($movies as $column) { ?> <!--call column's element-->
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
    <?php ; } 
    $conn->close() ?>
    </table>