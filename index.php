<?php
    require "connection.php";
    if($connection){
        echo "connected";
    }else{
        echo "failed to connect to database";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Signup</h2>
    <form action="Asignup.php" method="post">
        <div class="input-group">
            <label for="fname">FirstName:</label>
            <input type="text" name="fname">
        </div>

        <div class="input-group">
            <label for="lname">LastName:</label>
            <input type="text" name="lname">
        </div>

        <button type="submit">SignUp</button>
    </form>
</body>
</html>