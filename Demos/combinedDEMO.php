<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Diaplay Demo</title>
    <link rel="stylesheet" href="styles/crud.css">
</head>

<div class="table">
<?php
    #PDO is php database object
    $database = new PDO ('sqlite:moviedemoDB.db'); #establishes connection to the database

    $statement = $database ->query("SELECT * FROM movies");

    $movieSelect_StMt = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border=1>";

    echo "<tr>";
    echo "<td>Title</td>";
    echo "<td>Description</td>";
    echo "<td>length</td>";
    echo "<td>Rating</td>";
    echo "</tr>";


    //   $movies is the name of the table
    //for each row inside movies from movieSelect_StMt (it selects the table and statements we can choose from)
    foreach($movieSelect_StMt as $row => $movies){
        echo "<tr>";
        echo "<td>" .  $movies['movieName']   .   "</td>";
        echo "<td>" .  $movies['movieDescription']   .   "</td>";
        echo "<td>" .  $movies['length']   .   "</td>";
        echo "<td>" .  $movies['Rating']   .   "</td>";
        echo "</tr>";
    } 

    echo "</table>"

?>
</div>


<!-- ------------------------------------------------------------------------------------------------------------------------ -->



<div class="input">
<h1>Add Movie to database</h1> 
<?php
if (!isset($_POST['input-submit'])) {  
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

<h1>Rating</h1>
<input type="number" name="rating" required>

<input type="submit" name="input-submit">
</form>
<?php

} else {
    try{
        #PDO is php database object
        $database1 = new PDO ('sqlite:moviedemoDB.db'); #establishes connection to the database
        //this inserts data into the actuall database, but we have placeholder values in place, which are binded to the html form input information, 
        $sql1 = "INSERT INTO movies (movieName, movieDescription, length, Rating) VALUES (:movieName, :movieDescription, :length, :Rating)"; 
        
        $stmt1 = $database->prepare($sql1); //prepare statement object

        $title = filter_input(INPUT_POST, 'title');
        $stmt1->bindValue(':movieName', $title, PDO::PARAM_STR);
        #this binds the placeholder parameter :moviename to the html input box named 'title'

        $description = filter_input(INPUT_POST, 'description');
        $stmt1->bindValue(':movieDescription', $description, PDO::PARAM_STR);

        $movielength = filter_input(INPUT_POST, 'length');
        $stmt1->bindValue(':length', $movielength, PDO::PARAM_INT);

        $rating = filter_input(INPUT_POST, 'rating'); #html input rating
        $stmt1->bindValue(':Rating', $rating, PDO::PARAM_INT);
            #for when the button gets presseed
            $success1 = $stmt1 -> execute();
            if ($success1){      #if the execute is successful it will echo the film printed successfully
                echo "Film has been added to database";
            } else{
                echo "an unexpected error has occured";}
                #if a unexpected error occurs, its printed out here
            $database1 = null;
        #this catches any and all errors from the database to php, 
        #in this case its try and except is catching PDO exeception 
        #l                                         PDO is php database object
    } catch (PDOException  $e) {
        print"PDEO error, ". $e->getMessage(). "<br/>";
        #if the exception goes off, it prints out my own string with a combined error code message. 
    }
}
?>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="update">
    <h1>Update Movies in database</h1> 
<?php
if (!isset($_POST['submit-update'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
<form action="<?php echo htmlentities($_SERVER['PHP_SElf']);?>" method="post">
<h1>Movie To Update</h1>
<input type="text" name="title" required>

<h1>New Description</h1>
<input type="text" name="description" required>

<h1>New length</h1>
<input type="number" name="length">

<h1>New Rating</h1>
<input type="number" name="rating" required>

<input type="submit" name="submit-update">
</form>

<?php

} else {
    try{
        #PDO is php database object
        $database2 = new PDO ('sqlite:moviedemoDB.db'); #establishes connection to the database
        //this inserts data into the actuall database, but we have placeholder values in place, which are binded to the html form input information, 
        $sql2 = "UPDATE movies SET movieName = :movieName, movieDescription = :movieDescription, length = :length, Rating = :Rating WHERE movieName = :movieName"; #sql statement made into a update
        
        $stmt2 = $database2->prepare($sql2); //prepare statement object

        $title = filter_input(INPUT_POST, 'title');
        $stmt2->bindValue(':movieName', $title, PDO::PARAM_STR);
        #this binds the placeholder parameter :moviename to the html input box named 'title'

        $description = filter_input(INPUT_POST, 'description');
        $stmt2->bindValue(':movieDescription', $description, PDO::PARAM_STR);

        $movielength = filter_input(INPUT_POST, 'length');
        $stmt2->bindValue(':length', $movielength, PDO::PARAM_INT);

        $rating = filter_input(INPUT_POST, 'rating'); #html input rating
        $stmt2->bindValue(':Rating', $rating, PDO::PARAM_INT);

            #for when the button gets presseed
            
            $success2 = $stmt2 -> execute();
            if ($success2){      #if the execute is successful it will echo the film printed successfully
                echo "Database has been updated";
            } else{
                echo "an unexpected error has occured";}
                #if a unexpected error occurs, its printed out here
        $database2 = null;

        #this catches any and all errors from the database to php, 
        #in this case its try and except is catching PDO exeception 
        #l                                         PDO is php database object
    } catch (PDOException  $e) {
        print"PDEO error, ". $e->getMessage(). "<br/>";
        #if the exception goes off, it prints out my own string with a combined error code message. 
    }
}
?>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="delete">
<h1>Remove from database</h1> 


<?php
if (!isset($_POST['submit4'])) {  
    // checking for if the submit button has been pressed or not
    
?>
<!-- if its not pressed display the following html code: -->
<form action="<?php echo htmlentities($_SERVER['PHP_SElf']);?>" method="post">
<h1>Movie to delete</h1>
<input type="text" name="title" required>


<input type="submit" name="submit4">
</form>




<?php

} else {
    try{
        #PDO is php database object
        $database3 = new PDO ('sqlite:moviedemoDB.db'); #establishes connection to the database
        //this inserts data into the actuall database, but we have placeholder values in place, which are binded to the html form input information, 
        $sql3 = "DELETE FROM movies WHERE movieName = :movieName;"; #sql statement is an update statement now. 
        
        $stmt3 = $database3->prepare($sql3); //prepare statement object

        $title = filter_input(INPUT_POST, 'title'); # makes title set to a filter input
        $stmt3->bindValue(':movieName', $title, PDO::PARAM_STR); #binds :moviename to title which is a html input element 
        #this binds the placeholder parameter :moviename to the html input box named 'title'

            #for when the button gets presseed
            
            $success3 = $stmt3 -> execute();
            if ($success3){      #if the execute is successful it will echo the film printed successfully
                echo "Database has been updated";
            } else{
                echo "an unexpected error has occured";}
                #if a unexpected error occurs, its printed out here
        $database3 = null;



        #this catches any and all errors from the database to php, 
        #in this case its try and except is catching PDO exeception 
        #l                                         PDO is php database object
    } catch (PDOException  $e) {
        print"PDEO error, ". $e->getMessage(). "<br/>";
        #if the exception goes off, it prints out my own string with a combined error code message. 
    }
}
?>
</div>