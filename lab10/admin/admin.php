<?php

include('../cfg.php');
include('login.php');
include('pagemanage.php');
include('categorymanage.php');


if (isset($_SESSION['status'])) 
{

} 
else 
{
    echo FormularzLogowania();
    Logowanie($link);
}

ob_start();
if (isset($_SESSION['status']))
{
    ListaPodstron($link);
    echo EdytujPodstroneFormularz();
    EdytujPodstrone();
    echo DodajNowaPodstroneFormularz();
    DodajNowaPodstrone();
    echo UsunPodstroneFormularz();
    UsunPodstrone();
}
ob_end_flush();

ob_start();
if (isset($_SESSION['status']))
{
    ListaKategorii($link);
    echo DodajKategorieFormularz();
    DodajKategorie();
    echo UsunKategorieFormularz();
    UsunKategorie();
    echo EdytujKategorieFormularz();
    EdytujKategorie();
}
ob_end_flush();
	

?>