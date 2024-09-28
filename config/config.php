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

$conn = new PDO ("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

    // using pdo
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// if($conn == true){
//     echo "db connection established";
// }else{
//     echo "error";
// }
} catch (PDOException $Exception) {
    echo "error: ".$Exception->getMessage();
}
