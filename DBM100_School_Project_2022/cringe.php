
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Fried Searcher</title>

    <!--Bootstrap Stuff -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2974991b92.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<div class="grid-container">
  <div class="item1" id="named">Name</div>
  <div class="item2" id="recipe">
    <h1>Recipe</h1>
    <p>vzhvlshfhdsghlkshglkdsjl;gjdsjgljdslgjdfljglfdgjfdghfdlhgdfhgkjhfdghdfghfdfhgkfdgidfgihdfog</p>
  </div>
<?php
  $ching = 'https://www.totinos.com/wp-content/uploads/2021/03/pepperoni-pizza-rolls.png'
  ?>
  <div class="item3" id="gridImg">
    <img src="<?php echo $ching; ?>" alt="bacony">
  </div>  
  
  <div class="item4" id="rcorners3">
    <h1>Temperature</h1>
    <h2>Cook at</h2>
    <h3>$TEMPERATURE Degrees </h3>
    <h2>Cook For</h2>
    <h5>$TIMEMINUTES:$TIMESECONDS</h4>
</div>

  <div class="item5" id="rating">Overall Rating: </div>
  <div class="item6" id="entry">timeEntry</div>
</div>


</body>
</html>