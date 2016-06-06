<!DOCTYPE html>
<!--Presentation/nieuweKlantForm.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Nieuwe klant</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Klant aanmaken</h1>
        <form method="post" action="voegklanttoe.php?action=nieuweklant">
            <table>
                <tr>
                    <td>Voornaam:</td>
                    <td>
                        <input type="text" name="txtVoornaam">
                    </td>
                </tr>
                <tr>
                    <td>Familienaam:</td>
                    <td>
                        <input type="text" name="txtFamilienaam">
                    </td>
                </tr>
                <tr>
                    <td>Telefoon:</td>
                    <td>
                        <input type="text" name="txtTelefoon">
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="txtEmail">
                    </td>
                </tr>
                <tr>
                    <td>Adres:</td>
                    <td>
                        <input type="text" name="txtAdres">
                    </td>
                </tr>
                <tr>
                    <td>Gemeente:</td>
                    <td>
                        <input type="text" name="txtGemeente">
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
