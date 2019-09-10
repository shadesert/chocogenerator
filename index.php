<?php
    include 'connection.php';

    $statementsweet = $connection->prepare("SELECT name FROM sweetingredients;");
    $statementsweet->execute();
    $statementsemi = $connection->prepare("SELECT name FROM semisweetingredients;");
    $statementsemi->execute();
    $statementdarkness = $connection->prepare("SELECT name FROM chocodarknesstypes;");
    $statementdarkness->execute();
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
        <h1>Maak een nieuwe, spectaculaire chocoladereep<br>met één druk op de knop.</h1>
        <form>
            <button class="defaultBtn" onclick="return showFlavour()">Maak een reep!</button>
        </form>
        <div class="flavourContainer">
            <p id="flavour" class="flavour"></p>
            <span class="iconSpan"><i class="fa fa-heart-o heart"></i></span>
        </div>
        <ul class="linkContainer">
            <li><a class="popularity" id="popularity" href="popularity.php">Populaire smaken</a></li>
            <li><a class="newIngr" href="newingr.php">Voeg ingrediënt toe</a></li>
        </ul>
        <script>
            let sweet = [
                <?php
                    foreach($statementsweet->fetchAll(PDO::FETCH_ASSOC) as $result){
                        echo '"'.$result["name"].'",';
                    }
                ?> 
            ];
            let semiSweet = [
                <?php
                    foreach($statementsemi->fetchAll(PDO::FETCH_ASSOC) as $result){
                        echo '"'.$result["name"].'",';
                    }
                ?>
            ];
            let chocoDarkness = [
                <?php
                    foreach($statementdarkness->fetchAll(PDO::FETCH_ASSOC) as $result){
                        echo '"'.$result["name"].'",';
                    }
                ?>
            ];
        </script>
        <script src="https://use.fontawesome.com/498bb3a966.js"></script>
        <script src="chocogenerator.js"></script>
    </body>
</html>