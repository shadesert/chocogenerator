<?php
    if (isset($_GET['sweet'])){ 
        $sweet = $_GET['sweet'];
    }

    if (isset($_GET['semiSweet'])){ 
        $semiSweet = $_GET['semiSweet'];
        $semiSweet = strtolower($semiSweet);
    }

    if (isset($_GET['chocoDarkness'])){ 
        $chocoDarkness = $_GET['chocoDarkness'];
        $chocoDarkness = strtolower($chocoDarkness);
    }

    include 'connection.php';

    $combination = $sweet." ".$semiSweet." ".$chocoDarkness;
    echo $combination;

    $statement = $connection->prepare("DELETE FROM testproject.flavourcombinations WHERE '$combination' = name;");
    $statement->execute();

    $connection = null;
?>