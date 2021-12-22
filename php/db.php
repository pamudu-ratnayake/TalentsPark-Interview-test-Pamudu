<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "photography";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS photography(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            title VARCHAR (25) NOT NULL,                            
                            amount FLOAT,
                            image Blob
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
