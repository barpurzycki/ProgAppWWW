<?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

    /* po tym komentarzu będzie kod do dynamicznego ładowania stron */

    if($_GET['idp']=='')$strona = '../lab4/html/glowna.html';
    if($_GET['idp']=='cyberpunk')$strona = '../lab4/html/cyberpunk.html';
    if($_GET['idp']=='ff14')$strona = '../lab4/html/finalfantasy.html';
    if($_GET['idp']=='eldenring')$strona = '../lab4/html/eldenring.html';
    if($_GET['idp']=='ds')$strona = '../lab4/html/darksouls.html';
    if($_GET['idp']=='tw3')$strona = '../lab4/html/witcher.html';
    if($_GET['idp']=='kontakt')$strona = '../lab4/html/kontakt.html';
    if($_GET['idp']=='filmy')$strona = '../lab4/html/filmy.html';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="pl"/>
        <meta name="Author" content="Bartosz Purzycki"/>
        <link rel="stylesheet" href="css/styles.css">
        <title>
            Moje hobby to gry komputerowe
        </title>
    </head>
    <body style="background-image: url('Pictures/background.jpg');">
        <?php
            include($strona);
        ?>
    </body>
</html>