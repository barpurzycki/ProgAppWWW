<html>
<body>
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
    echo 'Hello ' . htmlspecialchars($_GET["nr_indeksu"]) . '!';
    

?>
</body>
</html>
