<?php
    #include 'databaseFile.php';     #when calling files like this it runs what code was within the file. 
    $database = new PDO('sqlite:AirFryerRecipies.db');

    if($_POST['searchButton']){  #if the search button is pressed do the following
        $order_post = $_POST['orderMenu'];
        $order_str = "$order_post";

        $choices_post = $_POST['choices'];
        $tableSelect = "$choices_post";

        switch ($order_str){
            case 'HtLbR':
                $sql = "SELECT * FROM $tableSelect WHERE name LIKE :toBeSearched ORDER BY rating DESC;";
                break;
            case 'LtHbR':
                $sql = "SELECT * FROM $tableSelect WHERE name LIKE :toBeSearched ORDER BY rating ASC;";
                break;
            case 'AtZ':
                $sql = "SELECT * FROM $tableSelect WHERE name LIKE :toBeSearched ORDER BY name ASC;";
                break;
            case 'ZtA':
                $sql = "SELECT * FROM $tableSelect WHERE name LIKE :toBeSearched ORDER BY name DESC;";
                break;
            case 'T_lt_H':
                $sql = "SELECT * FROM $tableSelect WHERE name LIKE :toBeSearched ORDER BY timeMinutes ASC;";
        }
        

        $user_search = $_POST['search_entry'];  #set $usersearch to the posted search entry text
        #IDEA HAVE A function return what the sql is going to be, if $selected is allfoods, then return a string selecting the all foods table, and vise versa for the others 
        #sql text to be queried, :tobesearched is a placeholder that will be binded to the value of user search
        
        $stmt = $database->prepare($sql); #preparing the sql statement 
                                        #the % make it so the search doesent have to be percise
        $stmt->bindValue(':toBeSearched', '%'.$user_search.'%', PDO::PARAM_STR); #this segment binds the value of $user_search to :toBesearched, and makes it a str
        $stmt->execute(); #most likely executes all previous statements
        $results = $stmt->fetchAll(); #fetches an array of statements results
        
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Fried Searcher</title>

    <!--Bootstrap Stuff -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    
</head>

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
    <a href="#"><i class="fa-light fa-table"></i> Search For Foods</a>
    <a href=<?php echo "sites/insertFood.php" ?>>Insert New recipes</a>
    <a href="<?php echo "sites/removeFoods.php" ?>">remove</a>
    <a href="<?php echo "sites/updateFoods.php" ?>">Update </a>
    <a href="<?php echo "sites/cringe.php" ?>">once </a>
    
  </div>
</div>


<body>
    <!-- selects different tables -->
    <div class="container">
        <form action="airSearch.php" method="post">

        <select name="choices">
          <option value="Allrecipes">All Recipes</option>
          <option value="DinnerRecipes">Dinner Recipes</option>
          <option value="BreakfastRecipes">Breakfast Recipes</option>
          <option value="LunchRecipes">Lunch Recipes</option>
        </select>

        <select name="orderMenu">
          <option value="HtLbR">High to Low By Rating</option>
          <option value="LtHbR">Low to High by Rating</option>
          <option value="AtZ">A-Z Names</option>
          <option value="ZtA">Z-A Names</option>
          <option value="T_lt_H">Quickest To Make</option>
        </select>

        <h4>Search for a Specific Fryer recipe: </h4>
            <input type="text" placeholder="Hamburger" name="search_entry">
            <input type="submit" value="Search" name="searchButton">
        </form>
    </div>



    <div class="container">
        <?php
            echo "$tableSelect";


            if(count($results) >= 1){ #if the returned count is greater than or equal to one, this checks the amount of rows returned to the statement and makes sure at least something is returned
                echo '<table class="table table-striped">';
                echo '<tr>';
                echo '<td>Food Name</td>';
                echo '<td>Temerature</td>';
                echo '<td>Minutes</td>';
                echo '<td>Seconds</td>';
                echo '<td>recipe</td>';
                echo '<td>rating</td>';
                echo '<td>Image</td>';
                echo '<td>TimeStamp</td>';
                if ($tableSelect == 'Allrecipes'){
                    echo '<td>Orgin</td>';
                }
                echo "</tr>";

                
                foreach($results as $r){

                    echo "<div class='grid-container'>";
                    echo "<div class='item1' id='named'>Name</div>";
                    echo "<div class='item2' id='recipe'></div>";
                    echo "<div class='item3' id='gridImg'>image</div>";
                    echo "<div class='item4' id='rcorners3'>temps</div>";
                    echo "<div class='item5' id='rating'>rating</div>";
                    echo "<div class='item6' id='entry'>timeEntry</div>";
                    echo "</div>";
                   
                    #the text inside might have to become a function as well, to display the different tables that have different names
                    #OR experiment more with the same names in the database and more precise callings, that might be easiest 
                    echo '<tr>';
                    echo '<td>'.$r['name'].'</td>';
                    echo '<td>'.$r['temperature'].'</td>';
                    echo '<td>'.$r['timeMinutes'].'</td>';
                    echo '<td>'.$r['timeSeconds'].'</td>';
                    echo '<td>'.$r['recipe'].'</td>';
                    echo '<td>'.$r['rating'].'</td>';
                    echo '<td>'.$r['imageName'].'</td>';
                    echo '<td>'.$r['timeStamp'].'</td>';
                    if ($tableSelect = "Allrecipes"){
                        echo '<td>'.$r['tables_Orgin'].'</td>';
                    }
                    echo "</tr>";
                    
                }
                echo "</table>";
            } else{
                #if theres really nothing to return it prints out a blanket statement
                echo '<h4 class="text-danger">No Search Turned Up '.$user_search.'</h4>';
            }
            



            
        ?>

    </div>
</body>
</html>