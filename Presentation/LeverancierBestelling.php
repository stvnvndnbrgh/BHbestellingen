<!DOCTYPE html>
<!--Presentation/LeverancierBestelling.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Leverancier bestelling</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1> Bestelling te plaatsen bij: <?php print $lijst[0]['leveranciernaam'] ?></h1>
        <p>Beste, </p>
        <p>Graag volgende bestelling:</p>
        <ul>
            <?php foreach($lijst as $rij) { ?>
            <li><?php print($rij['aantal'] . " x " . $rij['artikelnaam']); ?></li>
                    <?php
            }
        ?>
        </ul>
        <p>Met vriendelijke groeten,</p>
        <p>Elke Sleurs</p>
        
        <a href="toonallebestellingen.php"><button type="button">Terug naar bestellingen</button></a>
        <a href="plaatsbestelling.php?action=<?php print($lijst[0]['lev']); ?>"><button type="button">Bestelling plaatsen</button></a>

    </body>
</html>
