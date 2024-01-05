<?php

session_start();

include('../cfg.php');

#Funkcja wypisująca formularz logowania na stronę
function FormularzLogowania()
{
	$wynik= '
	<div class="logowanie">
	    <h1 class="heading">Panel logowania</h1>
        <div class="logowanie">
	        <form method="post" name="LoginForm" enctype-"multipart/form-data" action="'. $_SERVER['REQUEST_URI'].'">
	            <table class="logowanie">
		        <tr><td class="log4_t">Email:</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
		        <tr><td class="log4_t">Hasło:</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
		        </table>
	        </form>
	    </div>
	</div>
	';
	
	return $wynik;
}

#Funkcja odpowiadająca za logowanie na stronie
function Logowanie($link)
{
    if (isset($_POST['x1_submit'])) 
	{
        $mail = $_POST['login_email'];
        $haslo = $_POST['login_pass'];

        $query = "SELECT * FROM uzytkownik WHERE email = '$mail' AND haslo = '$haslo' LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) 
		{
            $_SESSION['status'] = 1;
            header("Location: admin.php");
			exit();
        } 
		else 
		{
            echo "Dane logowania są niepoprawne. <br></br>";
        }
    }
}

?>