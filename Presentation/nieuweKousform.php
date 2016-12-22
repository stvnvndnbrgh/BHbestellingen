<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BH-Nieuwe klant</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <h1>Kous aanmaken</h1>
        <a href="toonallebestellingen.php"><button type="button">Terug naar bestellingen</button></a><br /><br />
        <form method="post" action="voegkoustoe.php?action=nieuwekous">
            <table>
                
                <tr>
                    <td>
                        Merk:
                    </td>
                    <td>
                        <select name="merk"  style="width:300px;">
                            <?php foreach ($merken as $merk) {?>
                            <option value="<?php print($merk['merk']); ?>">
                                <?php print($merk['merk']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newMerk"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Kwaliteit/Type:
                    </td>
                    <td>
                        <select name="kwaliteit">
                            <?php foreach ($kwaliteiten as $kwaliteit) {?>
                            <option value="<?php print($kwaliteit['kwaliteit']); ?>">
                                <?php print($kwaliteit['kwaliteit']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newKwaliteit">                       
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Drukklasse:
                    </td>
                    <td>
                        <select name="drukklasse">
                            <?php foreach ($drukklasses as $drukklasse) {?>
                            <option value="<?php print($drukklasse['drukklasse']); ?>">
                                <?php print($drukklasse['drukklasse']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newDrukklasse"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Lengte:
                    </td>
                    <td>
                        <select name="lengte">
                            <?php foreach ($lengtes as $lengte) {?>
                            <option value="<?php print($lengte['lengte']); ?>">
                                <?php print($lengte['lengte']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newLengte"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                       Maat:
                    </td>
                    <td>
                        <select name="maat">
                            <?php foreach ($maten as $maat) {?>
                            <option value="<?php print($maat['maat']); ?>">
                                <?php print($maat['maat']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newMaat"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Kleur:
                    </td>
                    <td>
                        <select name="kleur">
                            <?php foreach ($kleuren as $kleur) {?>
                            <option value="<?php print($kleur['kleur']); ?>">
                                <?php print($kleur['kleur']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newKleur"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Voet:
                    </td>
                    <td>
                        <select name="voetgrootte">
                            <?php foreach ($voetgroottes as $voetgrootte) {?>
                            <option value="<?php print($voetgrootte['voetgrootte']); ?>">
                                <?php print($voetgrootte['voetgrootte']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newVoetgrootte"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Bijzonderheden:
                    </td>
                    <td>
                        <select name="bijzonderheden">
                            <?php foreach ($bijzonderheden as $bijzonderheid) {?>
                            <option value="<?php print($bijzonderheid['bijzonderheden']); ?>">
                                <?php print($bijzonderheid['bijzonderheden']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name ="newBijzonder"> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Bestelcode:
                    </td>
                    <td>
                        <input name="bestelcode">
                    </td>
                    <td> 
                    </td>
                </tr>                
                <tr>
                    <td>
                        Barcode:
                    </td>
                    <td>
                        <input name="barcode"<?php if(isset($barcode)){?> value="<?php echo($barcode); ?>" <?php } ?>>
                    </td>
                    <td> 
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Aanmaken"><a href ="voegkoustoe.php"><button type="button">Cancel</button></a>
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>        
    </body>
</html>
