<?php 
try{
    $database = new PDO('sqlite:AirFryerRecipies.db');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h6>connection estabblished</h6>\n";
} catch (PDOException $e){
    echo "connection failed, error code: ",$e -> getMessage();
}

?>



