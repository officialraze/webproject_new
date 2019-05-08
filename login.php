<?php

require 'config.php';
session_start();
if (HOME == true) {
	$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', 'root');
}
else {
	$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', '');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Webprojekt - Login</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/base.css">

	<link href='http://fonts.googleapis.com/css?family=Raleway:100,700,800' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
<div class="back_link">
	<a href="index.php">Zurück</a>
</div>
<div class="form_outer">
	<div class="form_inner">
		<h2>Anmelden</h2>
		<?php

		if(isset($_GET['login'])) {
		    $email = $_POST['email'];
		    $passwort = $_POST['passwort'];

		    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		    $result = $statement->execute(array('email' => $email));
		    $user = $statement->fetch();

		    //Überprüfung des Passworts
		    if ($user !== false && password_verify($passwort, $user['passwort'])) {
		        $_SESSION['userid'] = $user['id'];
		        die('
							<h3 class="login_success_title">Login erfolgreich.</h3>
							<p>Weiter zum <a href="login_redirect.php">Dashboard</a></p>
						');
		    } else {
		        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
		    }
		}



		if(isset($errorMessage)) {
		    echo '<span class="error">'.$errorMessage.'<span>';
		}
		?>
		<form action="?login=1" method="post">
		<span>E-Mail:</span>
		<input type="email" size="40" maxlength="250" name="email"><br><br>

		<span>Dein Passwort:</span>
		<input type="password" size="40"  maxlength="250" name="passwort"><br><br>

		<input type="submit" value="Abschicken">
		</form>
	</div>
</div>

</body>
</html>
