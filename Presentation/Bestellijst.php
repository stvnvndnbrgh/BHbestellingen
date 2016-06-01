<!DOCTYPE html>
<!--Presentation/Bestellijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Bestellingen</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <h1>Bestelling</h1>
        <table border: 1px solid black>
            <tr>
                <th>Artikel</th>
                <th>Klant</th>
                <th>Leverancier</th>
                <th>Status</th>
                <th>Createdate</th>
                <th>Editdate</th>
            </tr>
            <?php foreach($lijst as $rij){ ?>
            <tr>
                <td><?php $rij->Leverancier->getLeveranciernaam() ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
