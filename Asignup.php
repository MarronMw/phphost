<?php
require_once "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && $connection){
    $name=$_POST["fname"];
    $surName=$_POST["lname"];
  
        $result=$connection->query("SELECT fname, lname FROM users WHERE users.fname=$name AND users.lname=$surName;");
        $csql="SELECT * FROM users WHERE users.fname=? AND users.lname=?";
        $check=$connection->prepare($csql);
        $check->bind_param("ss",$name,$surName);
        $check->execute();
        $result=$check->get_result();

        if($result->num_rows>0){
            header("Location:index.php? oops something went wrong");
            $check->close();
            $connection->close();
        }else{

            if( !empty($name) && !empty($surName)){
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
                
                echo $name;
                echo $surName;
            }
        }
}else{
    echo "Bad Gate Way";
}
