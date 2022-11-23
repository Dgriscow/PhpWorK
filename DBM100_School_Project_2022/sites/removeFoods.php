<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Entrys</title>
    <link rel="stylesheet" href="styles/crud.css">
</head>
<body>
<h1>Remove Food from Database</h1> 
<?php
if (!isset($_POST['remove'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
<form action="../sites/removeFoods.php" method="post">
<select name="Fruit">
        <option value="AllRecipes">Remove All Recipes from matching Tables</option>
        <option value="DinnerRecipes">DinnerRecipes</option>
        <option value="BreakfastRecipes">BreakfastRecipes</option>
        <option value="LunchRecipes">LunchRecipes</option>
        </select>
<h1>Food</h1>
<input type="text" name="food" >

<input type="submit" name="remove" value="Insert">
</form>
<?php

} else {
    try{
        $database = new PDO('sqlite:../AirFryerRecipies.db');
        // $database = new PDO('sqlite:AirFryerRecipes.db');
        $postpost = $_POST['Fruit'];
        $tableSelect = "$postpost";
        echo "INSERTIN ";
        echo "$tableSelect";
        echo "<a href='../airSearch.php'>Search Screen</a>";
        
        #IDEA HAVE A function return what the sql is going to be, if $selected is allfoods, then return a string selecting the all foods table, and vise versa for the others 
        $del = "DELETE FROM $tableSelect WHERE name= :name;"; #sql text to be queried, :tobesearched is a placeholder that will be binded to the value of user search
        $delstmt = $database->prepare($del); #preparing the sql statement 
        echo "passed prepare ";

        #inputs and bindings
        $food = filter_input(INPUT_POST, 'food');
        $delstmt->bindValue(':name', $food, PDO::PARAM_STR);
        #this binds the placeholder parameter :moviename to the html input box named 'title'
        echo " binded 1";

        $success = $delstmt->execute();
        #for when the button gets presseed
        
        if ($success){      #if the execute is successful it will echo the film printed successfully
            echo "Food has been removed from database";
        } else{
            echo "an unexpected error has occured";}
            #if a unexpected error occurs, its printed out here
    $database = null;
} catch (PDOException  $e) {
    print"PDEO error, ". $e->getMessage(). "<br/>";
    #if the exception goes off, it prints out my own string with a combined error code message. 
}
}
?>
</body>
</html>



