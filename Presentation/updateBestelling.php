<!DOCTYPE html>
<!--Presentation/updateBestelling.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Bestelling status</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Update Bestelling</h1>
        
        <form method="post" action="bewerkbestelling.php?action=bewerkbestelling&id=<?php print($bestelling->getId());?>">
            <table>
                <tr>
                    <td>Klant:</td>
                    <td>
                        <?php print($bestelling->getKlant_id()->getVoornaam()." ".$bestelling->getKlant_id()->getFamilienaam()) ?>
                    </td>
                </tr>
                <tr>
                    <td>Artikel:</td>
                    <td>
                        <?php print($bestelling->getArtikel_id()->getArtikelnaam()) ?>
                    </td>
                </tr>
                <tr>
                    <td>Aantal:</td>
                    <td>
                        <input type="text" name ="txtAantal" value =<?php print($bestelling->getAantal()) ?> >
                    </td>
                </tr>
                <tr>
                    <td>Current Status:</td>
                    <td>
                        <?php print($bestelling->getStatus_id()->getStatus()); ?>
                    </td>
                </tr>
                <tr>
                    <td>New Status:</td>
                    <td>
                        <select name="selStatus">
                            <?php foreach($statusLijst as $status) { ?>
                            <option value="<?php print($status->getId()); ?>" <?php if($status->getId() == $bestelling->getStatus_id()->getId()){print(' selected');} ?>>
                                <?php print($status->getStatus()); ?>
                            </option>
                            <?php } ?>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Bijwerken" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
