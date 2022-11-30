<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Entrys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<!-- new side nav bar, trying something new -->
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg></button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Other Actions</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="../airSearch.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>Search For Foods</a>
    <a href=<?php echo "../sites/insertFood.php" ?>><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M9.636 13.5a.5.5 0 0 1-.5.5H2.5A1.5 1.5 0 0 1 1 12.5v-10A1.5 1.5 0 0 1 2.5 1h10A1.5 1.5 0 0 1 14 2.5v6.636a.5.5 0 0 1-1 0V2.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M5 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H6.707l8.147 8.146a.5.5 0 0 1-.708.708L6 6.707V10.5a.5.5 0 0 1-1 0v-5z"/>
</svg>Insert New recipes</a>
    <a href="<?php echo "../sites/removeFoods.php" ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>remove</a>
    <a href="<?php echo "#" ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
  <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
  <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
</svg>Update </a>
    <a href="<?php echo "../sites/cringe.php" ?>">once </a>
    
  </div>
</div>    
<h1>Update Food In database</h1> 
<?php
if (!isset($_POST['update'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
<p>Select The Type of Food You wish To Update</p>
<div class="container">
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
<textarea name="recipe" rows="4" cols="50"></textarea>


<h1>Image File Name</h1>
<input type="text" name="imageName">

<input type="submit" name="update" value="Update">
</form>
</div>
<?php

} else {
    try{
        $database = new PDO('sqlite:../AirFryerRecipies.db');
        // $database = new PDO('sqlite:AirFryerRecipes.db');
        $postpost = $_POST['choices'];
        $tableSelect = "$postpost";
        
        
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
            echo "Entry Has Been Updated - return to search screen -> ";
            echo "<a href='../airSearch.php'>Search Screen</a>";
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



