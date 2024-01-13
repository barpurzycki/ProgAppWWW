<link rel="stylesheet" href="css/sklepstyles.css">
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

session_start();

include('cfg.php');

#Funkcja, która pobiera informacje o produkcie z bazy danych
function ZnajdzProdukt($id) 
{
    global $link;

    $query = "SELECT * FROM produkty WHERE id = '$id' AND status_dostepnosci = 'Dostępny'";
    $result = mysqli_query($link, $query);

    if ($result->num_rows > 0) 
    {
        return $result->fetch_assoc();
    } 
    else 
    {
        return false;
    }
}

#Funkcja dodająca produkt do koszyka
function DodajDoKoszyka($id) 
{

    $productInfo = ZnajdzProdukt($id);

    if($productInfo) 
    {
        $isProductInCart = false;

        #Sprawdzenie, czy produkt jest w koszyku
        foreach ($_SESSION['koszyk'] as $index => $product) 
        {
            if ($product['id'] == $productInfo['id']) 
            {
                #Jeśli produkt jest już w koszyku, zwiększamy ilość tego samego produktu o 1
                $_SESSION['koszyk'][$index]['ilosc_w_koszyku'] += 1;
                echo "Produkt został dodany do koszyka. <br>";
                $isProductInCart = true;
                break;
            }
        }

        if (!$isProductInCart) 
        {
            #Jeśli nie było tego produktu w koszyku, dodajemy go do koszyka
            $product = array(
                'id' => $productInfo['id'],
                'tytul' => $productInfo['tytul'],
                'cena_netto' => $productInfo['cena_netto'],
                'podatek_vat' => $productInfo['podatek_vat'],
                'ilosc_w_koszyku' => 1,
            );

            $_SESSION['koszyk'][] = $product;
            echo "Produkt został dodany do koszyka. <br>";
        }
    } 
    else 
    {
        echo "Produkt niedostępny lub nie istnieje. <br>";
    }
}

#Funkcja umożliwiająca usunięcie produktu z koszyka
function UsunZKoszyka($index) 
{
    if (isset($_SESSION['koszyk'][$index])) 
    {
        unset($_SESSION['koszyk'][$index]);
        $_SESSION['koszyk'] = array_values($_SESSION['koszyk']);
    }
}

#Funkcja umożliwiająca edytowanie ilości produktów w koszyku
function EdytujIlosc($index, $quantity) 
{
    if (isset($_SESSION['koszyk'][$index])) 
    {
        $_SESSION['koszyk'][$index]['ilosc_w_koszyku'] = $quantity;
    }
}

#Funkcja wyświetlająca na stronie dostępne produkty w sklepie
function ListaProduktow() 
{

    global $link;

    $query = "SELECT * FROM produkty where status_dostepnosci = 'Dostępny'";
    $result = mysqli_query($link, $query);

    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            echo "Tytuł: " . $row["tytul"] . "<br>";
            echo "Opis: " . $row["opis"] . "<br>";
            echo "Cena netto: " . $row["cena_netto"] . "<br>";
            echo "Podatek VAT: " . $row["podatek_vat"] . "<br>";
            echo "Ilość dostępnych sztuk: " . $row["ilosc_dostepnych_sztuk"] . "<br>";
            echo "Status dostępności: " . $row["status_dostepnosci"] . "<br>";
            echo '<img src="' . $row["zdjecie"] . '" alt="' . $row["tytul"] . '" width="200"><br>';
            echo '<form method="post" action="">
                    <input type="hidden" name="id" value="' . $row["id"] . '">
                    <input type="submit" name="DodajDoKoszyka" value="Dodaj do koszyka">
                 </form>';
            echo "<hr>";
        }
    } 
    else 
    {
        echo "Brak produktów w bazie danych.";
    }
}

#Przetwarzanie formularza - dodawanie do koszyka, usuwanie z koszyka, edycja ilości w koszyku
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['DodajDoKoszyka'])) 
    {
        $id = $_POST['id'];
        DodajDoKoszyka($id);
    }

    if (isset($_POST['UsunZKoszyka'])) 
    {
        $index = $_POST['index'];
        UsunZKoszyka($index);
    }

    if (isset($_POST['EdytujIlosc'])) 
    {
        $index = $_POST['index'];
        $newQuantity = $_POST['newQuantity'];
        EdytujIlosc($index, $newQuantity);
    }
}

#Wyświetlanie listy produktów na stronie - wywołanie funkcji
ListaProduktow();

#Wyświetlenie koszyka
echo "<h2>Twój koszyk:</h2>";

if (!empty($_SESSION['koszyk'])) 
{
    $totalPrice = 0;

    foreach ($_SESSION['koszyk'] as $index => $product) 
    {
        echo "Tytuł: " . $product['tytul'] . "<br>";
        echo "Cena netto: " . $product['cena_netto'] . "<br>";
        echo "Podatek VAT: " . $product['podatek_vat'] . "<br>";
        echo "Ilość w koszyku: " . $product['ilosc_w_koszyku'] . "<br>";
        echo "Cena razem (netto): " . ($product['cena_netto'] * $product['ilosc_w_koszyku']) . "<br>";
        echo "Cena razem (brutto): " . ($product['cena_netto'] * $product['ilosc_w_koszyku']) * ($product['podatek_vat'] / 100 + 1) . "<br>";
        
        $totalPrice += $product['cena_netto'] * ($product['podatek_vat'] / 100 + 1) * $product['ilosc_w_koszyku'];

        echo '<form method="post" action="">
                <input type="hidden" name="index" value="' . $index . '">
                <input type="submit" name="UsunZKoszyka" value="Usuń z koszyka">
              </form>';
        echo '<form method="post" action="">
                <input type="hidden" name="index" value="' . $index . '">
                <input type="number" name="newQuantity" value="' . $product['ilosc_w_koszyku'] . '" min="1">
                <input type="submit" name="EdytujIlosc" value="Zmień ilość">
              </form>';
        echo "<hr>";
    }

    echo "Łączna cena wszystkich produktów w koszyku: " . $totalPrice . " zł" . "<br>";
    echo '<form method="post" action="order.php">
            <input type="submit" name="ZlozZamowienie" value="Złóż zamówienie">
          </form>';
} 
else 
{
    echo "Koszyk jest pusty.";
}


?>
