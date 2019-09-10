<?php
    if (isset($_GET['sweet']) && (preg_match("/^[a-zA-Z]+$/", $_GET['sweet']) == 1)){ 
        $sweet = $_GET['sweet'];
    }
    else{
        die("Geen geldige waarde");
    }

    if (isset($_GET['semiSweet']) && (preg_match("/^[a-zA-Z]+$/", $_GET['sweet']) == 1)){ 
        $semiSweet = $_GET['semiSweet'];
        $semiSweet = strtolower($semiSweet);
    }
    else{
        die("Geen geldige waarde");
    }

    if (isset($_GET['chocoDarkness']) && (preg_match("/^[a-zA-Z]+$/", $_GET['sweet']) == 1)){ 
        $chocoDarkness = $_GET['chocoDarkness'];
        $chocoDarkness = strtolower($chocoDarkness);
    }
    else{
        die("Geen geldige waarde");
    }

    include 'connection.php';

    $combination = $sweet." ".$semiSweet." ".$chocoDarkness;

    $statement = $connection->prepare("INSERT INTO testproject.flavourcombinations (name, rated) VALUES ('$combination', 1);");
    $statement->execute();

    $connection = null;
?>