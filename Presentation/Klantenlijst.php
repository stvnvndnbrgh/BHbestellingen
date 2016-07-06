<!DOCTYPE html>
<!--Presentation/klantenlijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Klanten</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Klanten</h1>
        <table border: 1px solid black>
            <tr>
                <th>Familienaam</th>  
                <th>Voornaam</th>
                <th>Adres</th>
                <th>Gemeente</th>
                <th>Telefoon</th>
                <th>Mobiel</th>
                <th>Email</th>               
            </tr>
            <?php foreach($lijst as $klant) { ?>
            <tr>
                <td><?php print($klant->getFamilienaam()); ?></td>
                <td><?php print($klant->getVoornaam()) ?></td>
                <td><?php print($klant->getAdres()) ?></td>
                <td><?php print($klant->getPostcode_id()->getPostcode() . " - " . $klant->getPostcode_id()->getGemeente()) ?></td>
                <td><?php print($klant->getTelefoonnr()) ?></td>
                <td><?php print("") ?></td>
                <td><?php print($klant->getEmail()) ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
