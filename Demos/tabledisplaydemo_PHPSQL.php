<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Diaplay Demo</title>
    <link rel="stylesheet" href="styles/crud.css">
</head>

<?php
    #PDO is php database object
    $database = new PDO ('sqlite:moviedemoDB.db'); #establishes connection to the database

    $statement = $database ->query("SELECT * FROM movies");

    $movieSelect_StMt = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border=1>";

    echo "<tr>";
    echo "<td>Title</td>";
    echo "<td>Description</td>";
    echo "<td>Description</td>";
    echo "</tr>";


    //   $movies is the name of the table
    //for each row inside movies from movieSelect_StMt (it selects the table and statements we can choose from)
    foreach($movieSelect_StMt as $row => $movies){
        echo "<tr>";
        echo "<td>" .  $movies['movieName']   .   "</td>";
        echo "<td>" .  $movies['movieDescription']   .   "</td>";
        echo "<td>" .  $movies['length']   .   "</td>";
        echo "</tr>";
    } 

    echo "</table>"

?>