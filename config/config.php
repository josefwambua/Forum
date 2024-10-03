// database connection

<?php

//host
try{
    //declaring host as a constant
define("HOST", "localhost");

// db name
define("DBNAME", "forum");

// user
define("USER", "root");

// password
define("PASS", "");


    // connection using php data object
$conn = new PDO ("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

    // executing
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// if($conn == true){
//     echo "db connection established";
// }else{
//     echo "error";
// }
    // catching the error
} catch (PDOException $Exception) {
    echo "error: ".$Exception->getMessage();
}
