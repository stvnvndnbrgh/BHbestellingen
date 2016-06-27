<!DOCTYPE html>
<!--Presentation/Bestellijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Bestellingen</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Bestellingen</h1>
        <a href="voegbestellingtoe.php"><button type="button">Nieuwe bestelling</button></a>
        <a href="voegklanttoe.php"><button type="button">Nieuwe klant</button></a><br/><br />
        <table border: 1px solid black>
            <tr>
                <th>Artikel</th>
                <th>Klant</th>
                <th>Leverancier</th>
                <th>Status</th>
                <th>Bewerken</th>                
                <th>Editdate</th>
                <th>Createdate</th>
            </tr>
            <?php foreach($lijst as $bestelling){ ?>          
            <tr bgcolor = "<?php print($bestelling->getStatus_id()->getColor()); ?>">
                <td><?php print($bestelling->getArtikel_id()->getArtikelnaam()); ?></td>
                <td><?php print($bestelling->getKlant_id()->getVoornaam()." ".
                        $bestelling->getKlant_id()->getFamilienaam()); ?></td>
                <td><?php print($bestelling->getArtikel_id()->getLeverancier_id()->getLeveranciernaam()); ?></td>
                <td><?php print($bestelling->getStatus_id()->getStatus()); ?></td>
                <td align = center>
                    <a href="bewerkbestelling.php?id=<?php print($bestelling->getId())?>"><img src="img/edit.png" /></a>
                    <a href="verwijderbestelling.php?id=<?php print($bestelling->getId())?>"><img src="img/delete.png" /></a>
                </td>
                <?php
                    $ed = new DateTime($bestelling->getEditdate());
                    $cd = new DateTime($bestelling->getCreatedate());
                    $format = "D j M y - H:i"
                ?>                
                <td><?php print($ed->format($format)); ?></td>
                <td><?php print($cd->format($format)); ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
