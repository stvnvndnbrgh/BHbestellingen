<!DOCTYPE html>
<!--//Presentation/Kousenlijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH - Kousenlijst</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Kousenlijst</h1>
        <table>
            <thead>
                <tr>
                    <th>Kous_id</th>
                    <th>Merk</th>
                    <th>Kwaliteit</th>
                    <th>Drukklasse</th>
                    <th>Lengte</th>
                    <th>Maat</th>
                    <th>Kleur</th>
                    <th>Voetgrootte</th>
                    <th>Bijzonderheden</th>
                    <th>Bestelcode</th>
                    <th>Barcode</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lijst as $kous)  {?>
                <tr>
                    <td><?php print($kous->getKous_id() ) ?></td>
                    <td><?php print($kous->getMerk() ) ?></td>
                    <td><?php print($kous->getKwaliteit() ) ?></td>
                    <td><?php print($kous->getDrukklasse() ) ?></td>
                    <td><?php print($kous->getLengte() ) ?></td>
                    <td><?php print($kous->getMaat() ) ?></td>
                    <td><?php print($kous->getKleur() ) ?></td>
                    <td><?php print($kous->getVoetgrootte() ) ?></td>
                    <td><?php print($kous->getBijzonderheden() ) ?></td>
                    <td><?php print($kous->getBestelcode() ) ?></td>
                    <td><?php print($kous->getBarcode() ) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
