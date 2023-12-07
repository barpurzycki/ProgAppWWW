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
                <li><b><a href="index.php?idp=">Strona główna</a></b></li>
                <li><b><a href="index.php?idp=cyberpunk">Cyberpunk 2077</a></b></li>
                <li><b><a href="index.php?idp=finalfantasy">Final Fantasy 14</a></b></li>
                <li><b><a href="index.php?idp=eldenring">Elden Ring</a></b></li>
                <li><b><a href="index.php?idp=darksouls">Dark Souls</a></b></li>
                <li><b><a href="index.php?idp=witcher">The Witcher 3</a></b></li>
                <li><b><a href="index.php?idp=kontakt">Kontakt</a></b></li>
            </ul>
        </div>
        <?php
            
            include('cfg.php');
            include('showpage.php');
        
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        
            #Wybieranie stron w menu, wykorzystuje funkcję PokazPodstrone() z pliku showpage.php
            if($_GET['idp'] == '') 
            {
                echo PokazPodstrone(1);
            }
            if($_GET['idp'] == 'cyberpunk') 
            {
                echo PokazPodstrone(2);
            }
            if($_GET['idp'] == 'finalfantasy') 
            {
                echo PokazPodstrone(3);
            }
            if($_GET['idp'] == 'eldenring') 
            {
                echo PokazPodstrone(4);
            }
            if($_GET['idp'] == 'darksouls') 
            {
                echo PokazPodstrone(5);
            }
            if($_GET['idp'] == 'witcher') 
            {
                echo PokazPodstrone(6);
            }
            if($_GET['idp'] == 'kontakt') 
            {
                echo PokazPodstrone(7);
            }
        ?>
        <div id="footer">
            <?php
                $nr_indeksu = '164422';
                $nrGrupy = 'ISI3';
            
                echo 'Autor: Bartosz Purzycki '.$nr_indeksu.' grupa '.$nrGrupy.'<br/>';
            ?>
        </div>
    </body>
</html>