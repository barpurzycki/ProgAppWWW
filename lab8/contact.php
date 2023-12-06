<?php

session_start();

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", 587);
ini_set("sendmail_from", "bartekpurzycki01@gmail.com");

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'moja_strona';

$link = mysqli_connect($dbhost, $dbuser, $dbpass);
if(!$link) echo '<b>Połączenie przerwane </b>';
if(!mysqli_select_db($link, $baza)) echo 'Nie wybrano bazy danych';

$odbiorca = "bartekpurzycki01@gmail.com";

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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

function WyslijMailKontakt($odbiorca)
{
    if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email'])) 
    {
        echo 'Nie wypełniłeś pola.';
    } 
    else 
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bartekpurzyckiwww@gmail.com';
        $mail->Password = 'dwly lgxe xncj vyax';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($_POST['email'], 'Formularz kontaktowy');
        $mail->addAddress($odbiorca);
        $mail->Subject = $_POST['temat'];
        $mail->Body = $_POST['tresc'];

        if ($mail->send()) 
        {
            echo 'Wiadomość wysłana.';
        } 
        else 
        {
            echo 'Błąd podczas wysyłania wiadomości: ' . $mail->ErrorInfo;
        }
    }
}

function PrzypomnijHasloFormularz()
{
    $wynik= '
	<div class="Przypomnij">
	    <h1 class="heading">Formularz przypominania hasła</h1>
        <div class="Przypomnij">
	        <form method="post" name="ContactForm" enctype-"multipart/form-data" action="'. $_SERVER['REQUEST_URI'].'">
	            <table class="Przypomnij">
		        <tr><td class="PrzypomnijForm">Email odbiorcy: </td><td><input type="text" name="emailodb" class="Przypomnij" /></td></tr>
                <tr><td class="PrzypomnijForm">Email z panelu: </td><td><input type="text" name="emailpan" class="Przypomnij" /></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" name="x2_submit" class="Przypomnij" value="Wyślij" /></td></tr>
		        </table>
	        </form>
	    </div>
	</div>
	';
	
	return $wynik;
}

function PrzypomnijHaslo()
{

    global $link;

    if (isset($_POST['x2_submit'])) 
	{
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bartekpurzyckiwww@gmail.com';
        $mail->Password = 'dwly lgxe xncj vyax';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mailodb = $_POST['emailodb'];
        $mailpan = $_POST['emailpan'];

        $query = "SELECT haslo FROM uzytkownik WHERE email = '$mailpan' LIMIT 1";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $haslo = $row['haslo'];

            $mail->setFrom($_POST['emailodb'], 'Proj App WWW');
            $mail->addAddress($mailodb);
            $mail->Subject = 'Przypomnienie hasla do panelu admina';
            $mail->Body = 'Twoje hasło do panelu admina: '.$haslo;

            if ($mail->send()) 
            {
                echo 'Wiadomość wysłana.';
            } 
            else 
            {
                echo 'Błąd podczas wysyłania wiadomości: ' . $mail->ErrorInfo;
            }
        }
    }
}


if (isset($_SESSION['status'])) 
{

} 
else 
{
    echo PokazKontakt();
    WyslijMailKontakt($odbiorca);
    echo PrzypomnijHasloFormularz();
    PrzypomnijHaslo();
}


?>