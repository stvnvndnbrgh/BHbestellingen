<!DOCTYPE html>
<!--Presentation/LeverancierLijstTePlaatsenBestellingen.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Te plaatsen bestellingen</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Te plaatsen bestellingen</h1>
        
        <ul>
            <?php
            foreach($lijst as $leverancier) { ?>
            <li><a href="besteloverzichtperleverancier.php?action=<?php print($leverancier['id']); ?>"> <?php print($leverancier['leveranciernaam']); ?></a></li>
            
            <?php }
            
            ?>
        </ul>
        
        <a href="toonallebestellingen.php"><button type="button">Terug naar bestellingen</button></a>
        

    </body>
</html>
