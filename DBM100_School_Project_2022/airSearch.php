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
    <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg> Search For Foods</a>

    <a href=<?php echo "sites/insertFood.php" ?>> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M9.636 13.5a.5.5 0 0 1-.5.5H2.5A1.5 1.5 0 0 1 1 12.5v-10A1.5 1.5 0 0 1 2.5 1h10A1.5 1.5 0 0 1 14 2.5v6.636a.5.5 0 0 1-1 0V2.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M5 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H6.707l8.147 8.146a.5.5 0 0 1-.708.708L6 6.707V10.5a.5.5 0 0 1-1 0v-5z"/>
</svg>Insert New recipes</a>

    <a href="<?php echo "sites/removeFoods.php" ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg> Remove</a>

    <a href="<?php echo "sites/updateFoods.php" ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
  <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
  <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
</svg> Update </a>

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

                    echo "<div class='item1' id='named'>".$r['name']."</div>";

                    echo "<div class='item2' id='recipe'>";
                    echo "<h1>Recipe</h1>";
                    if ($tableSelect = "Allrecipes"){
                        echo "<h6>".$r['tables_Orgin']."</h6>";
                    }
                    echo "<p>".$r['recipe']."</p>";
                    
                    echo "</div>";

                    echo "<div class='item3' id='gridImg'>";
                    echo "  <img src='".$r['imageName']."' alt='imageName'>";
                    echo "</div>";

                    echo "<div class='item4' id='rcorners3'>";
                    echo "  <h1>Temperature</h1>";
                    echo "  <h2>Cook at</h2>";
                    echo "  <h3>".$r['temperature']. "&#176 F</h3>";
                    echo "  <h2>Cook For</h2>";
                    echo "  <h5>".$r['timeMinutes']." Minutes</h5>";
                    echo "<h5>".$r['timeSeconds']." Seconds</h5>";
                    echo "</div>";

                    echo "<div class='item5' id='rating'>Overall Rating: ".$r['rating']."</div>";
                    echo "<div class='item6' id='entry'>".$r['timeStamp']."</div>";
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