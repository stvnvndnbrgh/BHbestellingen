<?php
require_once 'Vendor/vendor/autoload.php';
?>
<!DOCTYPE html>
<!--Presentation/klantenlijst.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Klanten</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet"type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
    </head>
    <body>
        <h1>Klanten</h1>
        <a href="toonallebestellingen.php"><button type="button">Terug naar bestellingen</button></a>
        <a href="voegklanttoe.php"><button type="button">Nieuwe klant</button></a><br /><br />
        <form method="post" action="toonalleklanten.php?action=zoek">
            <input type="text" name="zoekterm">
            <input type="submit" value ="Zoek"><br /><br />
        </form>
        <table id="table_id" class="display">
                <thead>   
                    <tr>
                        <th>Familienaam</th>  
                        <th>Voornaam</th>
                        <th>Adres</th>
                        <th>Gemeente</th>
                        <th>Telefoon</th>
                        <th>Mobiel</th>
                        <th>Email</th>               
                    </tr>
                </thead>
                <tbody>
            <?php foreach($lijst as $klant) { ?>
                    <tr>
                        <td><a href="toonklant.php?action=<?php print($klant->getId());?>"><?php print($klant->getFamilienaam()); ?></a></td>
                        <td><?php print($klant->getVoornaam()) ?></td>
                        <td><?php print($klant->getAdres()) ?></td>
                        <?php if($klant->getAdres()<>""){ ?>
                            <td><?php print($klant->getPostcode_id()->getPostcode() . " - " . $klant->getPostcode_id()->getGemeente()) ?></td>
                        <?php }else{ ?>
                            <td></td>
                        <?php } ?>
                        <td><?php print($klant->getTelefoonnr()) ?></td>
                        <td><?php print("") ?></td>
                        <td><?php print($klant->getEmail()) ?></td>
                    </tr>
            <?php } ?>
                </tbody>    
        </table>
    </body>
</html>
<script type="text/javascript">   
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
