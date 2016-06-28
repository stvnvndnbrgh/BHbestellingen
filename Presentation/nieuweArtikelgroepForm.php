<!DOCTYPE html>
<!--Presentation/nieuweArtikelgroepForm.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Nieuwe ArtikelGroep</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Artikelgroep aanmaken</h1>
        <form method="post" action="voegartikelgroeptoe.php?action=nieuweartikelgroep">
            <table>
                <tr>
                    <td>Artikelgroep:</td>
                    <td>
                        <input type="text" name="txtArtikelgroep"
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Aanmaken"><a href="voegartikeltoe.php"><button type="button">Cancel</button></a>
                    </td>
                </tr>
            </table>
    </body>
</html>
