<!DOCTYPE html>
<!--/Presentation/nieuweAankoop.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        var_dump($klant);
        ?>
        <a href="voegkoustoe.php"><button>Nieuwe kous</button></a></br></br>
        <form method="post" action ="voegaankooptoe.php?action=create">
            <table>
                <tr>
                    <td>
                        <label>Klant:</label>
                    </td>
                    <td>
                        <input type="text" name="klant" value = "<?php echo ($klant->getId());?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Barcode:</label>
                    </td>
                    <td>
                        <input type="text" name="barcode">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Aankoopdatum:</label>
                    </td>
                    <td>
                        <input type="text" name="aankoopdatum">
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
    </body>
</html>
