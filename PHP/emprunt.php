<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles.css" />
  </head>
  <body>
    <form action="emprunt2.php" method="post">
      <fieldset>
        <legend>Emprunt d'un livre</legend>
        <select name="cin" id="cin">
            <option value="0">Choisir un N°CIN</option>
            <?php
              require "connection.php";
              $query = mysqli_query($connect,"SELECT cin FROM abonne;");
              while($element = mysqli_fetch_array($query)){
                  echo "<option value='$element[0]'>$element[0]</option>";
              }
              mysqli_close($connect);
            ?>
        </select><br>
        <select name='titre' id='titre'>
            <option value='0'>Choisir un titre</option>
            <?php
              require "connection.php";
              $query = mysqli_query($connect,"SELECT titrelivre,numlivre FROM livre WHERE	nbrexp != 0;");
              while($element = mysqli_fetch_array($query)){
                echo "<option value='$element[1]'>$element[0]</option>";
              }
              mysqli_close($connect);
            ?>
        </select>
        <hr />
        <input type="submit" value="Valider" />
        <input type="reset" value="Annuler" />
      </fieldset>
    </form>
  </body>
</html>
