<!DOCTYPE html>
<!--Presentation/Mutualiteitlijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Mutualiteiten</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Mutualiteiten</h1>
        
        <table border: 1px solid black>
            <tr>
                <th>Nummer</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Gemeente</th>
                <th>Telefoon</th>
            </tr>
            <?php foreach($lijst as $mutualiteit) { ?>
            <tr>
                <td><?php print($mutualiteit->getMut_nummer()); ?></td>
                <td><?php print($mutualiteit->getMut_naam()); ?></td>
                <td><?php print($mutualiteit->getMut_adres()); ?></td>
                <td><?php print($mutualiteit->getMut_postcode_id()->getPostcode() . " - " . $mutualiteit->getMut_postcode_id()->getGemeente()); ?></td>
                <td><?php print($mutualiteit->getMut_tel()); ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
