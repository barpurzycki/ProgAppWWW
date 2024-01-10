<?php


include('../cfg.php');
include('login.php');
include('pagemanage.php');
include('categorymanage.php');
include('productmanage.php');

ob_start();
if (isset($_SESSION['status'])) 
{

} 
else 
{
    echo FormularzLogowania();
    Logowanie($link);
}

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

if (isset($_SESSION['status']))
{
    ListaKategorii();
    echo DodajKategorieFormularz();
    DodajKategorie();
    echo UsunKategorieFormularz();
    UsunKategorie();
    echo EdytujKategorieFormularz();
    EdytujKategorie();
}
	

if (isset($_SESSION['status']))
{
    ListaProduktow();
    echo DodajProduktFormularz();
    DodajProdukt();
    echo UsunProduktFormularz();
    UsunProdukt();
    echo EdytujProduktFormularz();
    EdytujProdukt();
}
ob_end_flush();

?>