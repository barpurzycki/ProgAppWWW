<?php

include('../cfg.php');

function ListaKategorii()
{
    global $link;

	$query = "SELECT * FROM kategorie WHERE matka = 0";
	$result = mysqli_query($link, $query);
	 
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "ID: ".$row['id']." Kategoria Główna: " . $row['nazwa'] . "<br>";
        
        $subResult = mysqli_query($link, "SELECT * FROM kategorie WHERE matka = " . $row['id']);
    
        while ($subRow = mysqli_fetch_assoc($subResult)) 
        {
            echo "&nbsp;&nbsp;&nbsp; ID: ".$subRow['id']. " Podkategoria: " . $subRow['nazwa'] . "<br>";
        }
    }
}

function DodajKategorieFormularz()
{
    $wynik = '
    <div class="DodajKat">
        <h1 class="heading">Dodaj kategorię</h1>
        <div class="DodajKat">
            <form method="post" name="NewCategoryForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="DodajKat">
                    <tr><td class="add_cat">Nazwa kategorii: </td><td><input type="text" name="cat_name_dodaj" class="DodajKat" /></td></tr>
                    <tr><td class="add_cat">ID kategorii(Jeśli dodajesz podkategorię):</td><td><input type="text" name="cat_mother_dodaj" class="DodajKat" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x5_submit" class="DodajKat" value="Dodaj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function DodajKategorie()
{
    global $link;

    if (isset($_POST['x5_submit'])) 
	{
        $nazwa = $_POST['cat_name_dodaj'];
        $matka = $_POST['cat_mother_dodaj'];

        if (!empty($matka)) 
        {
            $query = "INSERT INTO kategorie (nazwa, matka) VALUES ('$nazwa', '$matka')";
        } else 
        {
            $query = "INSERT INTO kategorie (nazwa, matka) VALUES ('$nazwa', 0)";
        }

        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: admin.php");
            exit();
        } 
		else 
		{
            echo "Tworzenie nowej kategorii nie powiodło się.";
        }
    }
}

function UsunKategorieFormularz()
{
    $wynik = '
    <div class="UsuwanieCat">
        <h1 class="heading">Usuń kategorię</h1>
        <div class="UsuwanieCat">
            <form method="post" name="DeleteCategoryForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="UsuwanieCat">
                    <tr><td class="rem_cat">ID kategorii: </td><td><input type="text" name="id_usuwanie_cat" class="UsuwanieCat" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x6_submit" class="UsuwanieCat" value="Usuń" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function UsunKategorie()
{
    global $link;

    if (isset($_POST['x6_submit'])) 
	{
        $id = $_POST['id_usuwanie_cat'];

        $query = "DELETE FROM kategorie WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: admin.php");
            exit();
        } 
		else 
		{
            echo "Usuwanie kategorii nie powiodło się.";
        }
    }
}

function EdytujKategorieFormularz()
{
    $wynik = '
    <div class="EdytujCat">
        <h1 class="heading">Edytuj kategorię</h1>
        <div class="EdytujCat">
            <form method="post" name="EditCatForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="EdytujCat">
                    <tr><td class="edit_cat">ID kategorii: </td><td><input type="text" name="id_edycja_cat" class="EdytujCat" /></td></tr>
                    <tr><td class="edit_cat">Nazwa kategorii : </td><td><input type="text" name="cat_name_edycja" class="EdytujCat" /></td></tr>
                    <tr><td class="edit_cat">ID Matki: </td><td><input type="text" name="mother_id_edycja" class="EdytujCat" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x7_submit" class="EdytujCat" value="Edytuj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function EdytujKategorie()
{
    global $link;

    if (isset($_POST['x7_submit'])) {
        $id = $_POST['id_edycja_cat'];
        $nazwa = $_POST['cat_name_edycja'];
        $matka = $_POST['mother_id_edycja'];

        if (!empty($id)) {
            if (empty($nazwa)) 
            {
                $query = "UPDATE kategorie SET matka = '$matka' WHERE id = $id LIMIT 1";
            } 
            else 
            {
                $query = "UPDATE kategorie SET nazwa = '$nazwa', matka = '$matka' WHERE id = $id LIMIT 1";
            }

            $result = mysqli_query($link, $query);

            if ($result) 
			{
                header("Location: admin.php");
                exit();
            } 
			else 
			{
                echo "Edycja kategorii nie powiodła się.";
            }
        }
    }
}

?>