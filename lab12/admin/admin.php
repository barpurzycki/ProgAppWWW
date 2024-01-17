<link rel="stylesheet" href=".../css/adminstyles.css">
<?php

include('../cfg.php');
include('login.php');

ob_start();
if (isset($_SESSION['status'])) 
{
    echo "<form method='post' action=''>
    <input type='submit' name='Wyloguj' value='Wyloguj'>
    </form>";
    echo "<a href='pagemanage.php'>Zarządzaj stronami</a>";
    echo "<br>";
    echo "<a href='categorymanage.php'>Zarządzaj kategoriami</a>";
    echo "<br>";
    echo "<a href='productmanage.php'>Zarządzaj produktami</a>";
} 
else 
{
    echo FormularzLogowania();
    Logowanie($link);
}
ob_end_flush();

if (isset($_POST['Wyloguj'])) {
    Wyloguj();
}

?>
