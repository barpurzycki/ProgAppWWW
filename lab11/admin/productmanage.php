<?php

include('../cfg.php');

function ListaProduktow()
{
    global $link;

    $query = "SELECT * FROM produkty";
    $result = mysqli_query($link, $query);
    
    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            echo "ID: " . $row["id"] . "<br>";
            echo "Tytuł: " . $row["tytul"] . "<br>";
            echo "Opis: " . $row["opis"] . "<br>";
            echo "Data utworzenia: " . $row["data_utworzenia"] . "<br>";
            echo "Data modyfikacji: " . $row["data_modyfikacji"] . "<br>";
            echo "Data wygaśnięcia: " . $row["data_wygasniecia"] . "<br>";
            echo "Cena netto: " . $row["cena_netto"] . "<br>";
            echo "Podatek VAT: " . $row["podatek_vat"] . "<br>";
            echo "Ilość dostępnych sztuk: " . $row["ilosc_dostepnych_sztuk"] . "<br>";
            echo "Status dostępności: " . $row["status_dostepnosci"] . "<br>";
            echo "Kategoria: " . $row["kategoria"] . "<br>";
            echo "Gabaryt produktu: " . $row["gabaryt_produktu"] . "<br>";
            echo '<img src="' . $row["zdjecie"] . '" alt="' . $row["tytul"] . '" width="200"><br>';
            echo "<hr>";
        }
    } 
    else 
    {
        echo "Brak produktów w bazie danych.";
    }
}

function DodajProduktFormularz()
{
    $wynik = '
    <div class="DodajProd">
        <h1 class="heading">Dodaj produkt</h1>
        <div class="DodajProd">
            <form method="post" name="NewProductForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="DodajProd">
                    <tr><td class="add_prod">Nazwa produktu: </td><td><input type="text" name="prod_name_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Opis:</td><td><input type="text" name="prod_desc_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Data utworzenia:</td><td><input type="date" name="prod_createdate_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Data modyfikacji:</td><td><input type="date" name="prod_moddate_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Data wygasniecia:</td><td><input type="date" name="prod_expdate_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Cena netto:</td><td><input type="text" name="prod_price_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Podatek VAT:</td><td><input type="text" name="prod_vat_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Ilość sztuk:</td><td><input type="text" name="prod_quant_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Kategoria:</td><td><input type="text" name="prod_cat_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Gabaryt produktu:</td><td><input type="text" name="prod_gau_dodaj" class="DodajProd" /></td></tr>
                    <tr><td class="add_prod">Zdjęcie produktu:</td><td><input type="text" name="prod_pic_dodaj" class="DodajProd" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x8_submit" class="DodajProd" value="Dodaj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function DodajProdukt()
{
    global $link;

    if (isset($_POST['x8_submit'])) 
	{
        $nazwa = $_POST['prod_name_dodaj'];
        $opis = $_POST['prod_desc_dodaj'];
        $utw = $_POST['prod_createdate_dodaj'];
        $mod = $_POST['prod_moddate_dodaj'];
        $wyg = $_POST['prod_expdate_dodaj'];
        $cena = $_POST['prod_price_dodaj'];
        $vat = $_POST['prod_vat_dodaj'];
        $ilosc = $_POST['prod_quant_dodaj'];
        $kat = $_POST['prod_cat_dodaj'];
        $gabaryt = $_POST['prod_gau_dodaj'];
        $zdj = $_POST['prod_pic_dodaj'];

        $query_category = "SELECT id FROM kategorie WHERE id = $kat";

        $result_cat = mysqli_query($link, $query_category);

        if($result_cat->num_rows == 0)
        {
            echo "Nie ma kategorii o takim ID.";
            return;
        }

        $status_dostepnosci = ($ilosc > 0 && $wyg >= date("Y-m-d")) ? "Dostępny" : "Niedostępny";

        $query = "INSERT INTO produkty (tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, cena_netto, podatek_vat, ilosc_dostepnych_sztuk, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) VALUES ('$nazwa', '$opis', '$utw', '$mod', '$wyg', '$cena', '$vat', '$ilosc', '$status_dostepnosci', '$kat', '$gabaryt', '$zdj')";
        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: admin.php");
            exit();
        } 
		else 
		{
            echo "Tworzenie nowego produktu nie powiodło się.";
        }
    }
}

function UsunProduktFormularz()
{
    $wynik = '
    <div class="UsuwanieProd">
        <h1 class="heading">Usuń produkt</h1>
        <div class="UsuwanieProd">
            <form method="post" name="DeleteProductForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="UsuwanieProd">
                    <tr><td class="rem_prod">ID produktu: </td><td><input type="text" name="id_usuwanie_prod" class="UsuwanieProd" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x9_submit" class="UsuwanieProd" value="Usuń" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function UsunProdukt()
{
    global $link;

    if (isset($_POST['x9_submit'])) 
	{
        $id = $_POST['id_usuwanie_prod'];

        $query = "DELETE FROM produkty WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: admin.php");
            exit();
        } 
		else 
		{
            echo "Usuwanie produktu nie powiodło się.";
        }
    }
}

function EdytujProduktFormularz()
{
    $wynik = '
    <div class="EdytujProd">
        <h1 class="heading">Edytuj produkt</h1>
        <div class="EdytujProd">
            <form method="post" name="EditProdForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="EdytujProd">
                    <tr><td class="edit_prod">ID produktu: </td><td><input type="text" name="id_edycja_prod" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Nazwa produktu: </td><td><input type="text" name="prod_name_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Opis produktu: </td><td><input type="text" name="prod_desc_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Data utworzenia: </td><td><input type="date" name="prod_createdate_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Data modyfikacji: </td><td><input type="date" name="prod_moddate_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Data wygasniecia: </td><td><input type="date" name="prod_expdate_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Cena netto: </td><td><input type="text" name="prod_price_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Podatek VAT: </td><td><input type="text" name="prod_vat_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Ilość sztuk: </td><td><input type="text" name="prod_quant_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Kategoria: </td><td><input type="text" name="prod_cat_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Gabaryt produktu: </td><td><input type="text" name="prod_gau_edycja" class="EdytujProd" /></td></tr>
                    <tr><td class="edit_prod">Zdjęcie produktu: </td><td><input type="text" name="prod_pic_edycja" class="EdytujProd" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x10_submit" class="EdytujProd" value="Edytuj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function EdytujProdukt()
{
    global $link;

    if (isset($_POST['x10_submit'])) 
	{
        $id = $_POST['id_edycja_prod'];
        $nazwa = $_POST['prod_name_edycja'];
        $opis = $_POST['prod_desc_edycja'];
        $utw = $_POST['prod_createdate_edycja'];
        $mod = $_POST['prod_moddate_edycja'];
        $wyg = $_POST['prod_expdate_edycja'];
        $cena = $_POST['prod_price_edycja'];
        $vat = $_POST['prod_vat_edycja'];
        $ilosc = $_POST['prod_quant_edycja'];
        $kat = $_POST['prod_cat_edycja'];
        $gabaryt = $_POST['prod_gau_edycja'];
        $zdj = $_POST['prod_pic_edycja'];

        $query_category = "SELECT id FROM kategorie WHERE id = $kat";

        $result_cat = mysqli_query($link, $query_category);

        if($result_cat->num_rows == 0)
        {
            echo "Nie ma kategorii o takim ID.";
            return;
        }

        $status_dostepnosci = ($ilosc > 0 && $wyg >= date("Y-m-d")) ? "Dostępny" : "Niedostępny";

        $query = "UPDATE produkty SET 
                    tytul = '$nazwa',
                    opis = '$opis',
                    data_utworzenia = '$utw',
                    data_modyfikacji = '$mod',
                    data_wygasniecia = '$wyg',
                    cena_netto = '$cena',
                    podatek_vat = '$vat',
                    ilosc_dostepnych_sztuk = '$ilosc',
                    status_dostepnosci = '$status_dostepnosci',
                    kategoria = '$kat',
                    gabaryt_produktu = '$gabaryt',
                    zdjecie = '$zdj'
                WHERE id = $id";

        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: admin.php");
            exit();
        } 
		else 
		{
            echo "Edycja produktu nie powiodła się.";
        }
    }
}

?>