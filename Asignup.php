<?php
require_once "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if ($connection){

        $sql="SELECT * FROM users WHERE users.fname=? AND users.lname=?";
        $check=$connection->prepare($sql);
        $check->bind_param("ss",$_POST["fname"],$_POST["lname"]);
        $check->execute();
        $result=$check->get_result();
    
        if($result->num_rows>0){
            header("location:index.php? oops looks like the user is already registered");
        }
    
        $query="INSERT INTO users (fname,lname) VALUES (?,?)";
        $stmt=$connection->prepare($query);
        $stmt->bind_param("ss",$_POST["fname"],$_POST["lname"]);
        if($stmt->execute()){
            echo "User sucessfully registered";
        }else{
            echo "failed to register user";
        }
        $stmt->close();
        $connection->close();
    }
}else{
    echo "Bad Gate Way";
}
