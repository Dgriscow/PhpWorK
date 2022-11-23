
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
<div class="container mt-5">
    <form action="" method="post" class="mb-3">
        <select name="Fruits[]">
          <option value="" disabled selected>Choose option</option>
          <option value="Apple">Apple</option>
          <option value="Banana">Banana</option>
          <option value="Coconut">Coconut</option>
          <option value="Blueberry">Blueberry</option>
          <option value="Strawberry">Strawberry</option>
        </select>
        <input type="submit" name="submit" vlaue="Choose options">
    </form>
    <?php
      if(isset($_POST['submit'])){
        if(!empty($_POST['Fruits'])) {
          foreach($_POST['Fruits'] as $selected){
            echo ' the mighty selected color is ' . $selected; //placehelded text, experiment with this and selecting/messing with chosing different tables in the database
          }          
        } else {
          echo 'Please select the value.';
        }
      }
    ?>
  </div>    