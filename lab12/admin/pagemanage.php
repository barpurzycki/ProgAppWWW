<link rel="stylesheet" href="../css/adminstyles.css">
<?php

session_start();

include('../cfg.php');

if (isset($_SESSION['status'])) 
{
    echo "<a href='admin.php'>Panel admina</a>";
    echo "<br>";
    echo "<a href='categorymanage.php'>Zarządzaj kategoriami</a>";
    echo "<br>";
    echo "<a href='productmanage.php'>Zarządzaj produktami</a>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
}


#Funkcja odpowiadająca za wyświetlanie listy podstron w bazie po zalogowaniu
function ListaPodstron()
{
    global $link;

	if (!isset($_SESSION['status']) || $_SESSION['status'] == 1) 
	{
		$query = "SELECT * FROM page_list ORDER BY id ASC";
		$result = mysqli_query($link, $query);
	 
	 	while($row = mysqli_fetch_array($result))
	 	{	
			echo 'ID:'.' '.$row['id'].' Tytuł: '.$row['page_title'].' <br/>';
	 	}
	}
}

#Funkcja odpowiadająca za wyświetlenie formularza umożliwiającego edycję podstron 
function EdytujPodstroneFormularz()
{
    $wynik = '
    <div class="Edytuj">
        <h1 class="heading">Edytuj podstronę</h1>
        <div class="Edytuj">
            <form method="post" name="EditPageForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="Edytuj">
                    <tr><td class="edit_4t">ID Podstrony: </td><td><input type="text" name="id_edycja" class="Edytuj" /></td></tr>
                    <tr><td class="edit_4t">Tytuł podstrony: </td><td><input type="text" name="page_title_edycja" class="Edytuj" /></td></tr>
                    <tr><td class="edit_4t">Treść podstrony: </td><td><input type="text" name="page_content_edycja" class="Edytuj" /></td></tr>
                    <tr><td class="edit_4t">Czy podstrona jest aktywna: </td><td><input type="checkbox" name="status_edycja" class="Edytuj" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x2_submit" class="Edytuj" value="Edytuj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

#Funkcja odpowiadająca za edycję podstron w bazie
function EdytujPodstrone()
{
    global $link;

    if (isset($_POST['x2_submit'])) {
        $id = $_POST['id_edycja'];
        $tytul = $_POST['page_title_edycja'];
        $tresc = $_POST['page_content_edycja'];
        $status = isset($_POST['status_edycja']) ? 1 : 0;

        if (!empty($id)) {
            $query = "UPDATE page_list SET page_title = '$tytul', page_content = '$tresc', status = $status WHERE id = $id LIMIT 1";

            $result = mysqli_query($link, $query);

            if ($result) 
			{
                header("Location: pagemanage.php");
                exit();
            } 
			else 
			{
                echo "Edycja strony nie powiodła się.";
            }
        }
    }
}

#Funkcja odpowiadająca za wyświetlanie formularza umożliwiającego dodanie nowej podstrony do bazy
function DodajNowaPodstroneFormularz()
{
    $wynik = '
    <div class="Dodaj">
        <h1 class="heading">Dodaj podstronę</h1>
        <div class="Dodaj">
            <form method="post" name="NewPageForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="Dodaj">
                    <tr><td class="add_4t">Tytuł podstrony: </td><td><input type="text" name="page_title_dodaj" class="Dodaj" /></td></tr>
                    <tr><td class="add_4t">Treść podstrony: </td><td><input type="text" name="page_content_dodaj" class="Dodaj" /></td></tr>
                    <tr><td class="add_4t">Czy podstrona jest aktywna: </td><td><input type="checkbox" name="status_dodaj" class="Dodaj" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x3_submit" class="Dodaj" value="Dodaj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

#Funkcja odpowiadająca za dodawanie nowych podstron do bazy
function DodajNowaPodstrone()
{
    global $link;

    if (isset($_POST['x3_submit'])) 
	{
        $tytul = $_POST['page_title_dodaj'];
        $tresc = $_POST['page_content_dodaj'];
        $status = isset($_POST['status_dodaj']) ? 1 : 0;

        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$tytul', '$tresc', $status)";
        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: pagemanage.php");
            exit();
        } 
		else 
		{
            echo "Tworzenie nowej podstrony nie powiodło się.";
        }
    }
}

#Funkcja odpowiadająca za wyświetlenie formularza umożliwiającego usuwanie podstron z bazy danych
function UsunPodstroneFormularz()
{
    $wynik = '
    <div class="Usuwanie">
        <h1 class="heading">Usuń podstronę</h1>
        <div class="Usuwanie">
            <form method="post" name="DeletePageForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="Usuwanie">
                    <tr><td class="rem_4t">ID podstrony: </td><td><input type="text" name="id_usuwanie" class="Usuwanie" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x4_submit" class="Usuwanie" value="Usuń" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

#Funkcja odpowiadająca za usuwanie podstron z bazy danych
function UsunPodstrone()
{
    global $link;

    if (isset($_POST['x4_submit'])) 
	{
        $id = $_POST['id_usuwanie'];

        $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) 
		{
            header("Location: pagemanage.php");
            exit();
        } 
		else 
		{
            echo "Usuwanie podstrony nie powiodło się.";
        }
    }
}

ob_start();
if (isset($_SESSION['status']))
{
    ListaPodstron();
    echo EdytujPodstroneFormularz();
    EdytujPodstrone();
    echo DodajNowaPodstroneFormularz();
    DodajNowaPodstrone();
    echo UsunPodstroneFormularz();
    UsunPodstrone();
}
ob_end_flush();

?>