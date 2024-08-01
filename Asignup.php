<?php
require_once "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["fname"];
    $surName=$_POST["lname"];

    if($connection && !empty($name) && !empty($surName)){
        $sql="INSERT INTO users (fname,lname) VALUES (?,?)";
        $stmt=$connection->prepare($sql);
        $stmt->bind_param("ss",$name,$surName);
        if($stmt->execute()){
            echo "Inserted";
        }else{
            echo "Error inserting into db";
        }

        $stmt=null;
        $connection=null;
    
    }
    
    echo $name;
    echo $surName;

    

}else{
    echo "Bad Gate Way";
}
