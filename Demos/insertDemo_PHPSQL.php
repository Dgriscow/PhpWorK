<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudInput Demo</title>
    <link rel="stylesheet" href="styles/crud.css">
</head>
<body>
<h1>Add Movie to database</h1> 
<?php
if (!isset($_POST['submit'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
<form action="<?php echo htmlentities($_SERVER['PHP_SElf']);?>" method="post">
<h1>MoVie Title</h1>
<input type="text" name="title" required>

<h1>Description</h1>
<input type="text" name="description" required>

<h1>length</h1>
<input type="number" name="length" required>

<input type="submit" name="submit">
</form>
<?php

} else {
    try{
        #PDO is php database object
        $database = new PDO ('sqlite:moviedemoDB.db'); #establishes connection to the database
        //this inserts data into the actuall database, but we have placeholder values in place, which are binded to the html form input information, 
        $sql = "INSERT INTO movies (movieName, movieDescription, length) VALUES (:movieName, :movieDescription, :length)"; 
        
        $stmt = $database->prepare($sql); //prepare statement object

        $title = filter_input(INPUT_POST, 'title');
        $stmt->bindValue(':movieName', $title, PDO::PARAM_STR);
        #this binds the placeholder parameter :moviename to the html input box named 'title'

        $description = filter_input(INPUT_POST, 'description');
        $stmt->bindValue(':movieDescription', $description, PDO::PARAM_STR);

        $movielength = filter_input(INPUT_POST, 'length');
        $stmt->bindValue(':length', $movielength, PDO::PARAM_INT);
            #for when the button gets presseed
            $success = $stmt -> execute();
            if ($success){      #if the execute is successful it will echo the film printed successfully
                echo "Film has been added to database";
            } else{
                echo "an unexpected error has occured";}
                #if a unexpected error occurs, its printed out here
        $database = null;
        #this catches any and all errors from the database to php, 
        #in this case its try and except is catching PDO exeception 
        #l                                         PDO is php database object
    } catch (PDOException  $e) {
        print"PDEO error, ". $e->getMessage(). "<br/>";
        #if the exception goes off, it prints out my own string with a combined error code message. 
    }
}
?>
</body>
</html>



