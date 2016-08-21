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
        <a href="teplaatsenbestellingen.php"><button type="button">Bestelling -> Leverancier</button></a>
        <a href="klantenverwittigen.php?action=verwittigen"><button type="button">Klanten verwittigen</button></a>
        <a href="toonalleklanten.php?action=klantentonen"><button type = "button">Klanten overzicht</button></a>
        <a href="toonallemutualiteiten.php?action=mutualiteitentonen"><button type =" "button">Mutualiteiten overzicht</button></a><br/><br/>
        <table border: 1px solid black>
            <tr>
                <th>Klant</th>
                <th>Artikel</th>
                <th>Aantal</th>
                <th>Leverancier</th>
                <th>Status</th>
                <th>Bewerken</th>                
                <th>Editdate</th>
                <th>Createdate</th>
            </tr>
            <?php foreach($lijst as $bestelling){ ?>          
            <tr bgcolor = "<?php print($bestelling->getStatus_id()->getColor()); ?>">
                
                <td><?php print($bestelling->getKlant_id()->getVoornaam()." ".
                        $bestelling->getKlant_id()->getFamilienaam()); ?></td>
                <td><?php print($bestelling->getArtikel_id()->getArtikelnaam()); ?></td>
                <td><?php print($bestelling->getAantal()); ?></td>
                <td><?php print($bestelling->getArtikel_id()->getLeverancier_id()->getLeveranciernaam()); ?></td>
                <td><?php print($bestelling->getStatus_id()->getStatus()); ?></td>
                <td align = center>
                    <a href="statusterug.php?action=statusterug&id=<?php print($bestelling->getId())?>"><img src="img/arrow-circle-right.png" title='status terug' class="rotate180"/></a>
                    <a href="statusvooruit.php?action=statusvooruit&id=<?php print($bestelling->getId())?>"><img src="img/arrow-circle-right.png" title='status vooruit'/></a>
                    <a href="bewerkbestelling.php?id=<?php print($bestelling->getId())?>"><img src="img/edit.png" title='bewerken' /></a>
                    <a href="verwijderbestelling.php?id=<?php print($bestelling->getId())?>"><img src="img/delete.png" title='delete'/></a>
                </td>
                <?php
                    $ed = new DateTime($bestelling->getEditdate());
                    $cd = new DateTime($bestelling->getCreatedate());
                    $format = "D d M y - H:i"
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
