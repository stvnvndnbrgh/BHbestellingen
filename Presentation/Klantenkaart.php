<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>BH - Klantenkaart</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Klantenkaart <?php print($klant->getFamilienaam() . " " . $klant->getVoornaam(). ":");?></h1>
        
        <table>
            <tr>
                        <th>Aankoopdatum</th>  
                        <th>Merk</th>
                        <th>Kwaliteit</th>
                        <th>Drukklasse</th>
                        <th>Lengte</th>
                        <th>Maat</th>
                        <th>Kleur</th>
                        <th>Voet</th>
                        <th>Bijzonderheden</th>
                        <th>Bestelcode</th>
                        <th>Barcode</th>
                    </tr>
            <!--<?php var_dump($lijst); ?>-->
        <?php foreach($lijst as $aankoop) { ?>
                    <tr>
                        <td><?php print($aankoop->getAankoopdatum()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getMerk()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getKwaliteit()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getDrukklasse()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getLengte()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getMaat()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getKleur()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getVoetgrootte()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getBijzonderheden()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getBestelcode()) ?></td>
                        <td><?php print($aankoop->getKous_id()->getBarcode()) ?></td>
                    </tr>
            <?php } ?>
        </table><br />
        <a href="toonalleklanten.php?action=klantentonen"><button type="button">Terug naar Klanten</button></a>
        <a href="toonallebestellingen.php"><button type="button">Terug naar bestellingen</button></a>
        <a href="voegaankooptoe.php?klant=<?php print($klant->getId()); ?>"><button type="button">Aankoop toevoegen</button></a><br /><br />
    </body>
    
</html>
