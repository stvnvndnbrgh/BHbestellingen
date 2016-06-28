<!DOCTYPE html>
<!--Presentation/nieuwArtikel.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Nieuw Artikel</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Artikel aanmaken</h1>
        <form method="post" action="voegartikeltoe.php?action=nieuwartikel">
            <table>
                <tr>
                    <td>Artikel:</td>
                    <td>
                        <input type="text" name="txtArtikel">
                    </td>
                </tr>
                <tr>
                    <td>Artikelgroep:</td>
                    <td>
                        <select name="selArtikelgroep">
                            <?php foreach($artikelGroepLijst as $artikelGroep) {?>
                            <option value="<?php print($artikelGroep->getId()); ?>">
                                <?php print($artikelGroep->getArtikelgroepnaam()); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Barcode:</td>
                    <td>
                        <input type="text" name="txtBarcode">                    
                    </td>
                </tr>
                <tr>
                    <td>Leverancier:</td>
                    <td>
                        <select name="selLeverancier">
                            <?php foreach ($leverancierslijst as $leverancier) {?>
                            <option value="<?php print($leverancier->getId()); ?>">
                                <?php print($leverancier->getLeveranciernaam()); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Aanmaken">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
