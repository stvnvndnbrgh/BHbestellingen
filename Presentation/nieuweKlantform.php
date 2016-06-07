<!DOCTYPE html>
<!--Presentation/nieuweKlantForm.php-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Nieuwe klant</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        if(isset($error) && $error == "gemeentebestaatniet") {
            
        }
        ?>
        <h1>Klant aanmaken</h1>
        <form method="post" action="voegklanttoe.php?action=nieuweklant">
            <table>
                <tr>
                    <td>Voornaam:</td>
                    <td>
                        <input type="text" name="txtVoornaam" value="<?php
                        if(isset($error)) {
                            print_r($_SESSION['txtVoornaam']);
                            
                        }?>">
                    </td>
                </tr>
                <tr>
                    <td>Familienaam:</td>
                    <td>
                        <input type="text" name="txtFamilienaam" value="<?php
                        if(isset($error)) {
                            print_r($_SESSION['txtFamilienaam']);
                            
                        }?>">
                    </td>
                </tr>
                <tr>
                    <td>Telefoon:</td>
                    <td>
                        <input type="text" name="txtTelefoon" value="<?php
                        if(isset($error)) {
                            print_r($_SESSION['txtTelefoon']);
                            
                        }?>">
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="txtEmail" value="<?php
                        if(isset($error)) {
                            print_r($_SESSION['txtEmail']);
                            
                        }?>">
                    </td>
                </tr>
                <tr>
                    <td>Adres:</td>
                    <td>
                        <input type="text" name="txtAdres" value="<?php
                        if(isset($error)) {
                            print_r($_SESSION['txtAdres']);
                            
                        }?>">
                    </td>
                </tr>
                <tr>
                    <td>Gemeente:</td>
                    <td>
                        <input type="text" name="txtGemeente" value="<?php
                        if(isset($error)) {
                            print_r($_SESSION['txtGemeente']);
                            
                        }?>">                    
                            <?php
                            if(isset($error) && $error == "gemeentebestaatniet") {
                                print("Gemeente bestaat niet!");
                            }
                            ?>
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
