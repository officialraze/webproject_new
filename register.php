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
  <title>Registrierung</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/form.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
	$vorname = $_POST['surname'];
	$nachname = $_POST['name'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));

        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
?>
<div class="back_link">
	<a href="index.php">Zurück</a>
</div>
<div class="form_outer">
	<div class="form_inner">
		<h2>Registrieren</h2>
		<form action="?register=1" method="post">
			<span>Vorname:</span>
			<input type="surname" size="40" maxlength="250" name="surname"><br><br>

			<span>Nachname:</span>
			<input type="name" size="40" maxlength="250" name="name"><br><br>

			<span>E-Mail:</span>
			<input type="email" size="40" maxlength="250" name="email"><br><br>

			<span>Dein Passwort:</span>
			<input type="password" size="40"  maxlength="250" name="passwort"><br><br>

			<span>Passwort wiederholen:</span>
			<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

			<input type="submit" value="Abschicken">
		</form>
	</div>
</div>

<?php
} //Ende von if($showFormular)
?>

</body>
</html>
