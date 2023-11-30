<?php

session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'moja_strona';

$link = mysqli_connect($dbhost, $dbuser, $dbpass);
if(!$link) echo '<b>Połączenie przerwane </b>';
if(!mysqli_select_db($link, $baza)) echo 'Nie wybrano bazy danych';

function PokazKontakt()
{
	$wynik= '
	<div class="kontakt">
	    <h1 class="heading">Formularz kontaktowy</h1>
        <div class="kontakt">
	        <form method="post" name="ContactForm" enctype-"multipart/form-data" action="'. $_SERVER['REQUEST_URI'].'">
	            <table class="kontakt">
		        <tr><td class="contact_form">Temat: </td><td><input type="text" name="temat" class="kontakt" /></td></tr>
		        <tr><td class="contact_form">Treść: </td><td><input type="text" name="tresc" class="kontakt" /></td></tr>
                <tr><td class="contact_form">Email: </td><td><input type="text" name="email" class="kontakt" /></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="kontakt" value="Wyślij" /></td></tr>
		        </table>
	        </form>
	    </div>
	</div>
	';
	
	return $wynik;
}

function WyslijMailKontakt($odbiorca)
{
    if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
        echo '[nie_wypelniles_pola]';
    }
    else
    {
        $mail['subject'] = $_POST['temat'];
        $mail['body'] = $_POST['tresc'];
        $mail['sender'] = $_POST['email'];
        $mail['reciptient'] = $odbiorca;

        $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: ";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapwww mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender'].">\n";

        mail($mail['reciptient'],$mail['subject'],$mail['body'],$header);

        echo '[wiadomosc_wyslana]';
    }
}

function PrzypomnijHaslo()
{

}



if (isset($_SESSION['status'])) 
{

} 
else 
{
    echo PokazKontakt();
    WyslijMailKontakt($odbiorca);
}


?>