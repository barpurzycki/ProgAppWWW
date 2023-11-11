<?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

    /* po tym komentarzu będzie kod do dynamicznego ładowania stron */

    if($_GET['idp']=='')$strona = '../lab5/html/glowna.html';
    if($_GET['idp']=='cyberpunk')$strona = '../lab5/html/cyberpunk.html';
    if($_GET['idp']=='ff14')$strona = '../lab5/html/finalfantasy.html';
    if($_GET['idp']=='eldenring')$strona = '../lab5/html/eldenring.html';
    if($_GET['idp']=='ds')$strona = '../lab5/html/darksouls.html';
    if($_GET['idp']=='tw3')$strona = '../lab5/html/witcher.html';
    if($_GET['idp']=='kontakt')$strona = '../lab5/html/kontakt.html';
    if($_GET['idp']=='filmy')$strona = '../lab5/html/filmy.html';
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
        <div id="menu">
            <ul>
                <li><b><a href="../lab5/index.php">Strona główna</a></b></li>
                <li><b><a href="../lab5/index.php?idp=cyberpunk">Cyberpunk 2077</a></b></li>
                <li><b><a href="../lab5/index.php?idp=ff14">Final Fantasy 14</a></b></li>
                <li><b><a href="../lab5/index.php?idp=eldenring">Elden Ring</a></b></li>
                <li><b><a href="../lab5/index.php?idp=ds">Dark Souls</a></b></li>
                <li><b><a href="../lab5/index.php?idp=tw3">The Witcher 3</a></b></li>
                <li><b><a href="../lab5/index.php?idp=kontakt">Kontakt</a></b></li>
                <li><b><a href="../lab5/index.php?idp=filmy">Filmy</a></b></li>
            </ul>
        </div>
        <?php
            include($strona);
        ?>
    </body>
</html>