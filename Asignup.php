<?php
require_once "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["fname"];
    $surName=$_POST["lname"];
    $resultFlag=0;

    if($connection){
        $fetch="SELECT * FROM users WHERE fname=$name AND lname=$surName";
        $result=$connection->query($fetch);

        if($result->num_rows>0){
            $resultFlag=1;
        }
    }
 
    if($connection && !empty($name) && !empty($surName) && $resultFlag){
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
    }else{
        header("Location:index.php? oops something went wrong");
    }


    

}else{
    echo "Bad Gate Way";
}
