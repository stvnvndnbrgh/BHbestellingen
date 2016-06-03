<!DOCTYPE html>
<!--Presentation/updateBestelling.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Bestelling</title>
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
                    <td>Status:</td>
                    <td>
                        <select name="selStatus">
                            <?php foreach($statusLijst as $status) { ?>
                            <option value="<?php print($status->getId()); ?>" <?php if($status->getStatus() == 4){print(" selected");} ?>>
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
