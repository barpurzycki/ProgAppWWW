<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="pl"/>
        <meta name="Author" content="Bartosz Purzycki"/>
        <link rel="stylesheet" href="../css/styles.css">
        <title>
            PHP - Moje hobby to gry komputerowe
        </title>
    </head>
    <body style="background-image: url('../Pictures/background.jpg');">
        <div id="header">
            <h1><i>Test PHP</i></h1>
        </div>
        <div id="menu">
        <ul>
                <li><b><a href="../index.html">Strona główna</a></b></li>
                <li><b><a href="../html/cyberpunk.html">Cyberpunk 2077</a></b></li>
                <li><b><a href="../html/finalfantasy.html">Final Fantasy 14</a></b></li>
                <li><b><a href="../html/eldenring.html">Elden Ring</a></b></li>
                <li><b><a href="../html/darksouls.html">Dark Souls</a></b></li>
                <li><b><a href="../html/witcher.html">The Witcher 3</a></b></li>
                <li><b><a href="../html/kontakt.html">Kontakt</a></b></li>
                <li><b><a href="../html/skrypty.html">Skrypty</a></b></li>
                <li><b><a href="../html/animacje.html">Animacje</a></b></li>
            </ul>
        </div>
        <div id="content">
            <?php
                $nr_indeksu = '164422 ';
                $nrGrupy = 'ISI3 ';

                echo 'Bartosz Purzycki '.$nr_indeksu.'grupa '.$nrGrupy.'<br/><br/>';

                echo 'Zastosowanie metody include()<br/><br/>';

                echo 'Podpunkt a)';
                echo '<br/><br/>';
                echo 'Wyświetla tekst z pliku includetest.php:';
                echo '<br/><br/>';

                include 'includetest.php';

                echo '<br/><br/>';
                echo 'Metoda require_once() sprawdza, czy plik został już wcześniej wywołany, jeśli nie, to go wywoła';
                echo '<br/><br/>';
                require_once 'includetest.php';
                echo '<br/>';
                require_once 'requireonce.php';
                echo '<br/><br/>';

                echo 'Podpunkt b)';
                echo '<br/><br/>';
                echo 'Warunek if, sprawdza czy większe jest a czy b';
                echo '<br/><br/>';

                $a = 20;
                $b = 20;

                echo 'a jest równe '.$a;
                echo '<br/>';
                echo 'b jest równe '.$b;
                echo '<br/>';

                if ($a > $b)
                {
                    echo 'a jest większe od b';
                }
                else 
                {
                    echo 'b jest większe od a';
                }
                echo '<br/><br/>';
                echo 'Tutaj użyty został warunek elseif';
                echo '<br/><br/>';
                if ($a > $b)
                {
                    echo 'a jest większe od b';
                }
                elseif ($a == $b)
                {
                    echo 'a jest równe b';
                }
                else 
                {
                    echo 'b jest większe od a';
                }

                echo '<br/><br/>';
                echo 'Teraz został użyty warunek switch';
                echo '<br/><br/>';
                $c = 2;

                switch ($c)
                {
                    case 0:
                        echo 'c jest równe 0';
                        break;
                    case 1:
                        echo 'c jest równe 1';
                        break;
                    case 2:
                        echo 'c jest równe 2';
                        break;
                }

                echo '<br/><br/>';
                echo 'Podpunkt c)';
                echo '<br/><br/>';
                echo 'Pętla while - wyświetla liczby dopóki nie doliczy do 10';
                echo '<br/><br/>';
                $d = 0;
                while ($d <= 10)
                {
                    echo $d++;
                    echo '<br/>';
                }
                echo '<br/><br/>';
                echo 'Pętla for - wyświetla liczby dopóki nie doliczy do 10';
                echo '<br/><br/>';
                for ($d = 0; $d <= 10; $d++) {
                    echo $d.'<br/>';
                }
                echo '<br/><br/>';

                echo 'Podpunkt d)';

                echo '<br/><br/>';

                echo 'Formularz z metodą GET';
                echo "<form action='get.php' method='get'>";
                echo "Name: <input type='text' name='name'/><br>";
                echo "<input type='submit'/><br><br>";
                echo "</form>";

                echo '<br/><br/>';

                echo 'Formularz z metodą POST';
                echo "<form action='post.php' method='post'>";
                echo "Name: <input type='text' name='name'/><br>";
                echo "<input type='submit'/><br><br>";
                echo "</form>";

                echo '<br/><br/>';

                echo 'Zmienna SESSION';
                echo '<br/><br/>';
                $_SESSION["color"] = "czarny";
                $_SESSION["animal"] = "pies";
                echo "<a href='session.php'>Session</a>";
                echo '<br/><br/>';
            ?>
        </div>
        <div id="footer">
            Autor: Bartosz Purzycki
        </div>
    </body>
</html>
