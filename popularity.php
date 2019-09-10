<?php
    include 'connection.php';

    $statement = $connection->prepare("SELECT SUM(rated), name FROM testproject.flavourcombinations WHERE rated != 0 GROUP BY name ORDER BY SUM(rated) DESC;");
    $statement->execute();
    
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
        <div class="flavourRankings">
            <table>
                <tr>
                    <th><i class="fa fa-heart heart noclick"></i></th>
                    <th>Smaak</th>
                </tr>
                <?php
                    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $result){
                        echo
                            "<tr>
                                <td>{$result['SUM(rated)']}</td>
                                <td>{$result['name']}</td>
                            </tr>";
                  }
                ?>
            </table>
        </div>
        <script src="https://use.fontawesome.com/498bb3a966.js"></script>
        <script src="chocogenerator.js"></script>
    </body>
</html>