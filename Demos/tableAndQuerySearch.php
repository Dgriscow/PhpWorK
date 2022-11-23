<?php
    #require 'databaseFile.php';     #when calling files like this it runs what code was within the file. 
    $database = new PDO('sqlite:moviedemoDB.db');



    if($_POST['searchButton']){  #if the search button is pressed do the following
        $user_search = $_POST['search_entry'];  #set $usersearch to the posted search entry text
        $sql = "SELECT * FROM movies WHERE movieName LIKE :toBeSearched"; #sql text to be queried, :tobesearched is a placeholder that will be binded to the value of user search
        $stmt = $database->prepare($sql); #preparing the sql statement 
                                        #the % make it so the search doesent have to be percise
        $stmt->bindValue(':toBeSearched', $user_search, PDO::PARAM_STR); #this segment binds the value of $user_search to :toBesearched, and makes it a str
        $stmt->execute(); #most likely executes all previous statements
        $results = $stmt->fetchAll(); #fetches an array of statements results
    }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADAM DEMO</title>

    <!--Bootstrap Stuff -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/crud.css">
</head>

<body>
    <div class="container">
        <form action="tableAndQuerySearch.php" method="post">
            <h4>Search for a Specific Foods Recipie:</h4>
            <input type="text" placeholder="Hamburger" name="search_entry">
            <input type="submit" value="Search" name="searchButton">
        </form>
    </div>


    
    <div class="container">
        <?php
            
            
            if(count($results) >= 1){ #if the returned count is greater than or equal to one, this checks the amount of rows returned to the statement and makes sure at least something is returned
                
                foreach($results as $r){

                    echo '<img src="images/'.$r['filename'].'">'; #small example on how to display images through the name as well (image files must be the same name)


                    echo '<table class="table table-striped">';
                    echo '<tr>';
                    echo '<td>'.$r['movieName'].'</td>';
                    echo '<td>'.  $r['movieDescription'].'</td>';
                    echo '<td>'.$r['length'].'</td>';
                    echo '<td>'.$r['Rating'].'</td>';
                    echo "</tr>";
                    echo "</table>";
                }
            } else{
                #if theres really nothing to return it prints out a blanket statement
                echo '<h4 class="text-danger">No Search Turned Up '.$user_search.'</h4>';
            }
        
        ?>

    </div>
</body>
</html>