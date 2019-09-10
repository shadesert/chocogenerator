<?php
    include 'connection.php';

    error_reporting(0);

    if (isset($_POST['text']) && (preg_match("/^[a-zA-Z]+$/", $_POST['text']) == 1)){
        $userflavour = ucfirst(strtolower($_POST['text']));
        echo "<div class=\"confirmation\">Smaak is toegevoegd!</div>";
    }
    else if (isset($_POST['text']) && (preg_match("/^[a-zA-Z]+$/", $_POST['text']) == 0)) {
        echo "<div class=\"error\">Geen geldige waarde</div>";
    }

    if ($userflavour != ""){
        $statement = $connection->prepare("INSERT INTO testproject.sweetingredients (name) VALUES ('$userflavour');");
        $statement->execute();
    }
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Choco Generator</title>
        <link href="chocogenerator.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="linkContainer">
            <a class="popularity" href="index.php">Terug</a>
        </div>
        <h1>Dit is lekker in een chocoladereep:</h1>
        <form action="newingr.php" method="post">
            <div class="flavourContainer">
                <p><input type="text" maxlength="30" name="text"/></p>
                <p><input type="submit" value="Voeg toe!"/></p>
            </div>
        </form>
        <script src="https://use.fontawesome.com/498bb3a966.js"></script>
        <script src="chocogenerator.js"></script>
    </body>
</html>