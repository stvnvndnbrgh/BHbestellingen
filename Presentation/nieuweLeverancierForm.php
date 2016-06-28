<!DOCTYPE html>
<!--Presentation/nieuweLeverancierForm.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Nieuwe Leverancier</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Leverancier aanmaken</h1>
        
        <form method="post" action="voegleveranciertoe.php?action=nieuweleverancier">
            <table>
                <tr>
                    <td>Leverancier:</td>
                    <td>
                        <input type="text" name="txtLeverancier">
                    </td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>
                        <input type="text" name="txtEmail">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Aanmaken"><a href="toonallebestellingen.php"><button type="button">Cancel</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
