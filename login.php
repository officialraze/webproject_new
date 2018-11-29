<?php

	// start session
	session_start();

	// clear error messages and valid user
	$errorMsg = "";
	$validUser = $_SESSION["login"] === true;

	// if form is sent with username and password check if correct
	if(isset($_POST["sub"])) {
		$validUser = $_POST["username"] == "molvin" && $_POST["password"] == "Raze_HD_6045";

		// if not correct user and / or password
		if(!$validUser) $errorMsg = "Falscher Benutzername oder Passwort.";
		else $_SESSION["login"] = true;
	}
	// login successful -> Location to robot :D
	if($validUser) {
		header("Location: three-js/examples/#webgl_animation_skinning_morph"); die();
	}
?>


<?php

// defenitions
$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', 'root');

// query for everything
$query = "SELECT * FROM `artist` artists
		  INNER JOIN `description` infos ON infos.artist_id = artists.id
		  ORDER BY `artist_name`
		  ";

// query for songs in music_player
$query_songs = "SELECT `song_name`, `album_name`, `cover`
				FROM `artist` artist
				INNER JOIN `songs` songs ON songs.artist_id = artist.id
				INNER JOIN `album` album ON album.album_id = songs.album_id
				";

//clear variable
$search = "";

// check if query is there and set new variable
if(isset($_POST['query'])) {
	$search = $_POST['query'];
}

?>
<!DOCTYPE html>
<html lang="de" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Web Projekt | Melvin Lauber</title>
		<meta name="description" content="Dies ist ein Webprojekt für Informatik der Klasse ME3." />
		<meta name="keywords" content="Webprojekt, ME3, Mediamatiker, Informatik, Dubstep, Electronic, Dance" />
		<meta name="author" content="Melvin" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/foundation.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/app.css"/>

		<!-- js for player -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/foundation.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

		<!-- Icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<!-- Include font -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:100,700,800' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/foundation.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

		<!-- Include Amplitude JS -->
		<script type="text/javascript" src="js/amplitude.js"></script>
		<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("U need a modern browser.");</script>
	</head>
	<body class="">
		<main>
			<div class="frame">
				<div class="title">
					<h3 class="title__name"><a href="index.php"><img src="img/ghost-solid.svg" width="60" alt="Logo"></a></h3>
				</div>
			</div>
			<p class="navipoint"><a href="login.php">Login</a></p>

			<h1 class="site_title">Webprojekt</h1>
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form" action="index.php" method="POST">
					<input class="morphsearch-input" name="query" type="text" placeholder="Suchen..."/>
					<input style="display: none;"type="submit" name="" value="">
					<button class="morphsearch-submit" type="submit">Suche</button>
				</form>
				<div class="morphsearch-content">
					<div class="dummy-column">
						<h2>Künstler</h2>
						<?php

						// random 5 entries in search overlay
						$query_search = "SELECT * FROM `artist` ORDER BY RAND() LIMIT 5";
							foreach ($pdo->query($query_search) as $row) {
								echo '<a class="dummy-media-object" href="">';
									echo '<img class="round" src="img/artist/round/'.$row['images'].'.jpg" alt="'.$row['artist_name'].'"/>';
									echo '<h3>'.$row['artist_name'].'</h3>';
								echo '</a>';
							}
						?>
						<a class="show_all" href="">Alle anzeigen <i class="fas fa-arrow-right"></i></a>
					</div>
				</div><!-- /morphsearch-content -->
				<span class="morphsearch-close"></span>
			</div>
			<h1 class="site_title">Login</h1>

			<form name="input" action="" method="post">
				<label for="username">Benutzername:</label><input type="text" value="<?= $_POST["username"] ?>" id="username" name="username" />
				<label for="password">Passwort:</label><input type="password" value="" id="password" name="password" />
				<div class="error"><?= $errorMsg ?></div>
				<input type="submit" value="Home" name="sub" />
			</form>
			<div class="overlay"></div>
		</main>
		<script src="js/classie.js"></script>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/charming.min.js"></script>
		<script src="js/TweenMax.min.js"></script>
		<script src="js/demo.js"></script>
		<script>
			(function() {
				// morph to fullscreen search
				var morphSearch = document.getElementById( 'morphsearch' ),
					input = morphSearch.querySelector( 'input.morphsearch-input' ),
					ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
					isOpen = isAnimating = false,
					// show/hide search area
					toggleSearch = function(evt) {
						// return if open and the input gets focused
						if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

						var offsets = morphsearch.getBoundingClientRect();
						if( isOpen ) {
							classie.remove( morphSearch, 'open' );

							// trick to hide input text once the search overlay closes
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}

							input.blur();
						}
						else {
							classie.add( morphSearch, 'open' );
						}
						isOpen = !isOpen;
					};

				// events
				input.addEventListener( 'focus', toggleSearch );
				ctrlClose.addEventListener( 'click', toggleSearch );
				// esc key closes search overlay
				// keyboard navigation events
				document.addEventListener( 'keydown', function( ev ) {
					var keyCode = ev.keyCode || ev.which;
					if( keyCode === 27 && isOpen ) {
						toggleSearch(ev);
					}
				} );

				// make button not clickable (search icon)
				morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			})();
		</script>
	</body>
</html>
