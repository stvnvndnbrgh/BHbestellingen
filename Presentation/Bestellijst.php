<!DOCTYPE html>
<!--Presentation/Bestellijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Bestellingen</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Bestelling</h1>
        <?php //var_dump($lijst); ?>
        <table border: 1px solid black>
            <tr>
                <th>Artikel</th>
                <th>Klant</th>
                <th>Leverancier</th>
                <th>Status</th>
                <th>Createdate</th>
                <th>Editdate</th>
            </tr>
            <?php foreach($lijst as $bestelling){ ?>
            
            <tr bgcolor = "<?php print($bestelling->getStatus_id()->getColor()); ?>">
                <td><?php print($bestelling->getArtikel_id()->getArtikelnaam()); ?></td>
                <td><?php print($bestelling->getKlant_id()->getVoornaam()." ".
                        $bestelling->getKlant_id()->getFamilienaam()); ?></td>
                <td><?php print($bestelling->getArtikel_id()->getLeverancier_id()->getLeveranciernaam()); ?></td>
                <td><?php print($bestelling->getStatus_id()->getStatus()); ?></td>
                <td><?php print($bestelling->getEditdate()); ?></td>
                <td><?php print($bestelling->getCreatedate()); ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
