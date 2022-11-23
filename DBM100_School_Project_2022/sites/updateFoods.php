<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Entrys</title>
    <link rel="stylesheet" href="styles/crud.css">
</head>
<body>
<h1>Update Food In database</h1> 
<?php
if (!isset($_POST['update'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
<p>Select The Type of Food You wish To Update</p>
<form action="../sites/updateFoods.php" method="post">
<select name="choices">
          <option value="DinnerRecipes">DinnerRecipes</option>
          <option value="BreakfastRecipes">BreakfastRecipes</option>
          <option value="LunchRecipes">LunchRecipes</option>
        </select>
<p>Any Option Left Empty is Filled in with Either Nothing or A Zero</p>
<h1>Food To Change</h1>
<input type="text" name="food" >

<h1>Temperature</h1>
<input type="number" name="temperature" >

<h1>Minutes</h1>
<input type="number" name="timeMinutes" >

<h1>Seconds</h1>
<input type="number" name="timeSeconds">

<h1>Rating</h1>
<input type="number" name="rating">

<h1>Recipe</h1>
<input type="text" name="recipe">

<h1>Image File Name</h1>
<input type="text" name="imageName">

<input type="submit" name="update" value="Insert">
</form>
<?php

} else {
    try{
        $database = new PDO('sqlite:../AirFryerRecipies.db');
        // $database = new PDO('sqlite:AirFryerRecipes.db');
        $postpost = $_POST['choices'];
        $tableSelect = "$postpost";
        echo "INSERTIN ";
        echo "$tableSelect";
        echo "<a href='../airSearch.php'>Search Screen</a>";
        
        #IDEA HAVE A function return what the sql is going to be, if $selected is allfoods, then return a string selecting the all foods table, and vise versa for the others 
        $upd = "UPDATE $tableSelect SET name=:name, temperature=:temperature, timeMinutes=:timeMinutes, timeSeconds=:timeSeconds, recipe=:recipe, rating=:rating, imageName=:imageName WHERE name=:name"; #sql text to be queried, :tobesearched is a placeholder that will be binded to the value of user search
        $updstmt = $database->prepare($upd); #preparing the sql statement 

        #inputs and bindings
        $food = filter_input(INPUT_POST, 'food');
        $updstmt->bindValue(':name', $food, PDO::PARAM_STR);
        #this binds the placeholder parameter :moviename to the html input box named 'title'

        $temperature = filter_input(INPUT_POST, 'temperature');
        $updstmt->bindValue(':temperature', $temperature, PDO::PARAM_INT);

        $timeMinutes = filter_input(INPUT_POST, 'timeMinutes');
        $updstmt->bindValue(':timeMinutes', $timeMinutes, PDO::PARAM_INT);


        $timeSeconds = filter_input(INPUT_POST, 'timeSeconds');
        $updstmt->bindValue(':timeSeconds', $timeSeconds, PDO::PARAM_INT);

        $recipe = filter_input(INPUT_POST, 'recipe');
        $updstmt->bindValue(':recipe', $recipe, PDO::PARAM_STR);

        $rating = filter_input(INPUT_POST, 'rating');
        $updstmt->bindValue(':rating', $rating, PDO::PARAM_INT);

        $imageName = filter_input(INPUT_POST, 'imageName');
        $updstmt->bindValue(':imageName', $imageName, PDO::PARAM_STR);

                                        
        
        $success = $updstmt->execute();
        #for when the button gets presseed
        
        if ($success){      #if the execute is successful it will echo the film printed successfully
            echo "Food has been Updated Inside The DataBase";
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



