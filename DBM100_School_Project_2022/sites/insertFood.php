
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food Entry</title>

    <!--Bootstrap Stuff -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styles.css">
</head>

<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">HammyBurger</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Other Actions</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="../airSearch.php">Search Screen</a>
    <a href=<?php echo "#" ?>>Insert New Recipes</a>
    <a href="<?php echo "../sites/removeFoods.php" ?>">remove</a>
    <a href="<?php echo "../sites/updateFoods.php" ?>">Update </a>
    
  </div>
</div>


<body>
<h1>Add Food to Database</h1> 
<?php
if (!isset($_POST['insert'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
    <P>Select What Time Of Day The Food Fits Best</P>
    <form action="../sites/insertFood.php" method="post">
    <select name="Fruit">
            <option value="DinnerRecipes">Dinner Recipes</option>
            <option value="BreakfastRecipes">Breakfast Recipes</option>
            <option value="LunchRecipes">Lunch Recipes</option>
            </select>
    <h1>Food Name</h1>
    <input type="text" name="food" >

    <h1>Temperature</h1>
    <input type="number" name="temperature" >

    <h1>Minutes</h1>
    <input type="number" name="timeMinutes" >

    <h1>Seconds</h1>
    <input type="number" name="timeSeconds">

    <h1>Recipe</h1>
    <input type="text" name="recipe">

    <h1>Rating</h1>
    <input type="text" name="rating">

    <input type="submit" name="insert" value="Insert">
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
        $add = "INSERT INTO $tableSelect (name, temperature, timeMinutes, timeSeconds, recipe, rating) VALUES (:name, :temperature, :timeMinutes, :timeSeconds, :recipe, :rating)"; #sql text to be queried, :tobesearched is a placeholder that will be binded to the value of user search
        $addstmt = $database->prepare($add); #preparing the sql statement 
        echo "passed prepare ";

        #inputs and bindings
        $food = filter_input(INPUT_POST, 'food');
        $addstmt->bindValue(':name', $food, PDO::PARAM_STR);
        #this binds the placeholder parameter :moviename to the html input box named 'title'
        echo " binded 1";

        $temperature = filter_input(INPUT_POST, 'temperature');
        $addstmt->bindValue(':temperature', $temperature, PDO::PARAM_INT);
        echo " binded 2";


        $timeMinutes = filter_input(INPUT_POST, 'timeMinutes');
        $addstmt->bindValue(':timeMinutes', $timeMinutes, PDO::PARAM_INT);
        echo " binded 3";


        $timeSeconds = filter_input(INPUT_POST, 'timeSeconds');
        $addstmt->bindValue(':timeSeconds', $timeSeconds, PDO::PARAM_INT);
        echo " passed binding ";
        $recipe = filter_input(INPUT_POST, 'recipe');
        $addstmt->bindValue(':recipe', $recipe, PDO::PARAM_STR);

        $rating = filter_input(INPUT_POST, 'rating');
        $addstmt->bindValue(':rating', $rating, PDO::PARAM_INT);

                                        
        
        $success = $addstmt->execute();
        echo "$food,  $timeSeconds";
        #for when the button gets presseed
        
        if ($success){      #if the execute is successful it will echo the film printed successfully
            echo "Food has been added to database";
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



