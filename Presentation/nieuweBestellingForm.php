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
                        <input type="text" name="txtKlant" />
                    </td>
                </tr>
                <tr>
                    <td>Artikel:</td>
                    <td>
                        <input type="text" name="txtArtikel" />
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="selStatus">
                            <?php foreach($statusLijst as $status) { ?>
                            <option value="<?php print($status->getStatus_id()); ?>" <?php if($status->getStatus_id() == 1){print("autofocus");} ?>>
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
