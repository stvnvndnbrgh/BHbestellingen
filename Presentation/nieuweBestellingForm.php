<!DOCTYPE html>
<!--Presentation/nieuweBestellingForm.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nieuwe Bestelling</title>
    </head>
    <body>
        <h1>Bestelling aanmaken</h1>
        <form method="post" action="voegbestellingtoe.php?action=nieuwebestelling">
            <table>
                <tr>
                    <td>Klant:</td>
                    <td>
                        <select name="selKlant">
                            <?php foreach($klantLijst as $klant) { ?>
                            <option value="<?php print($klant->getId()); ?>">
                                <?php print($klant->getVoornaam()." ".$klant->getFamilienaam()) ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Artikel:</td>
                    <td>
                        <select name="selArtikel">
                            <?php foreach($artikelLijst as $artikel){ ?>
                            <option value="<?php print($artikel->getId()); ?>">
                                <?php print($artikel->getArtikelnaam()) ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="selStatus">
                            <?php foreach($statusLijst as $status) { ?>
                            <option value="<?php print($status->getId()); ?>" <?php if($status->getStatus() == 1){print("autofocus");} ?>>
                                <?php print($status->getStatus()); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Toevoegen" />
                    </td>
                </tr>
            </table>
        </form> 
    </body>
</html>
