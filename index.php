<?php

require 'config.php';
require 'language/de.php';

// session information
session_start();
if (isset($_SESSION['userid'])) {
	$user_id = $_SESSION['userid'];
}

// defenitions
if (HOME == true) {
	$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', 'root');
}
else {
	$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', '');
}


// query for everything
$query = "SELECT * FROM `artist` artists
		  INNER JOIN `description` infos ON infos.artist_id = artists.id
		  ORDER BY `artist_name`
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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Web Projekt | Melvin Lauber</title>
		<meta name="description" content="Dies ist ein Webprojekt für Informatik der Klasse ME3." />
		<meta name="keywords" content="Webprojekt, ME3, Mediamatiker, Informatik, Dubstep, Electronic, Dance" />
		<meta name="author" content="Melvin" />
		<link rel="shortcut icon" href="favicon.ico">

		<!-- styles -->
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/foundation.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/app.css"/>
		<!-- AniCollection.css library -->
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">

		<!-- js for player -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/foundation.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

		<!-- Icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<!-- Include font -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:100,700,800' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

		<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="https://unpkg.com/tippy.js@4/themes/light-border.css">
	  	<link rel="stylesheet" href="https://unpkg.com/tippy.js@4/themes/translucent.css">
		<link rel="stylesheet" href="css/calendar.css">

	    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	    <script src="https://unpkg.com/tippy.js@4"></script>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/foundation.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
		<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
		<script src="js/calendar.js"></script>

		<!-- Include Amplitude JS -->
		<script type="text/javascript" src="js/amplitude.js"></script>
		<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("U need a modern browser.");</script>
	</head>
	<body class="loading">
		<main>
			<div class="frame">
				<div class="title">
					<h3 class="title__name"><a href=""><img src="img/logo.png" width="60" alt="Logo"></a></h3>
				</div>
				<div id="morphsearch" class="morphsearch">
					<form class="morphsearch-form" action="" method="POST">
						<input class="morphsearch-input" name="query" type="text" placeholder="Suchen..."/>
						<input style="display: none;"type="submit" name="" value="">
						<button class="morphsearch-submit" type="submit">Suche</button>
					</form>
					<div class="morphsearch-content">
					</div><!-- /morphsearch-content -->
					<span class="morphsearch-close"></span>
				</div>
			</div>

			<div class="login_form">
				<ul>
					<?php if (!isset($_SESSION['userid'])) { ?>
						<li><a href="register.php"><?php echo REGISTER; ?></a></li>
						<li><a href="login.php"><?php echo LOGIN; ?></a></li>
					<?php } ?>
					<?php if (isset($_SESSION['userid'])) { ?>
						<li><a href="logout.php">Ausloggen</a></li>
						<li><a href="dashboard/">Dashboard</a></li>
					<?php } ?>
					<div class="cf"></div>
				</ul>
			</div>

			<h1 class="site_title"><?php echo WEBSITE_TITLE; ?></h1>
			<div class="logged_in">
				<?php

					// check if logged in
					if (isset($_SESSION['userid'])) {
						$sql_user = "SELECT * FROM `users` user
								WHERE `id` = $user_id
							  ";
					  	// give out user which is logged in
					  	foreach ($pdo->query($sql_user) as $row) {
							echo 'Eingeloggt als: '. $row['vorname'] .' '.$row['nachname'] ;
						}
					}

				?>
			</div>
			<?php
				// if search-text (string) is longer than 3
				if(strlen($search) >= 3) {
					echo "<h1 class='search_text'>Ergebnisse für: <strong>".$search."</strong></h1>";
				}
				// if not more than 3
				else if(strlen($search) < 3 && strlen($search) > 0) {
					echo "<h1 class='search_text'><strong>Mindestens 3 Zeichen eingeben</strong></h1>";
				}
			?>
			<div class="login_success">
				<?php
					if(!isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
						die('Bitte zuerst <a href="login.php">einloggen</a>');
					}
				?>
			</div>
			<div class="grid-wrap">
				<div class="grid">

					<?php

					// if search input has more than 3 letters
					if(strlen($search) >= 3) {

			            // if variable is not empty, set query to search value in name and genre
			            if(!empty($search) || isset($search)) {
							$sql = "SELECT * FROM `artist` artists
									INNER JOIN `description` infos ON infos.artist_id = artists.id
									WHERE `artist_name` LIKE '%".$search."%' OR `genre` LIKE '%".$search."%'
									  ";
			            }

						// if nothing typed in, set query to all
						else {
							$sql = "SELECT * FROM `artist` artists
									INNER JOIN `description` infos ON infos.artist_id = artists.id
									ORDER BY `artist_name`
								  	";
			            }

						// give out entries
						foreach ($pdo->query($sql) as $row) {

							if (is_array($row) && !empty($row)) {
								// give out grid item / all artists
								echo '<a href="#" class="grid__item">';
									echo '<div class="grid__item-bg"></div>';
									echo '<div class="grid__item-wrap">';
										echo '<img class="grid__item-img" src="img/artist/'.$row['images'].'.jpg" alt="'.$row['artist_name'].'" />';
									echo '</div>';
									echo '<h3 class="grid__item-title">'.$row['artist_name'].'</h3>';
									echo '<h4 class="grid__item-number">'.$row['genre'].'</h4>';
								echo '</a>';
							}
							else {
								echo '<strong class="no_entries">Keine Ergebnisse gefunden</strong>';
							}
			            }
			        }

					// if empty show all
					else if(empty($search)){
						foreach ($pdo->query($query) as $row) {
							// give out grid item / all artists
							echo '<a href="#" data-anijs="if: scroll, on: window, do: bounceIn animated, before: scrollReveal" class="grid__item">';
								echo '<div class="grid__item-bg"></div>';
								echo '<div class="grid__item-wrap">';
									echo '<img class="grid__item-img" src="img/artist/'.$row['images'].'.jpg" alt="'.$row['artist_name'].'" />';
								echo '</div>';
								echo '<h3 class="grid__item-title">'.$row['artist_name'].'</h3>';
								echo '<h4 class="grid__item-number">'.$row['genre'].'</h4>';
							echo '</a>';
			            }
					}
					?>
				</div>
			</div>
			<div class="content">
				<?php
				// this is for the content in the detail page

				// if search input has more than 3 letters
				if(strlen($search) >= 3) {

					// if variable is not empty, set query to search value
					if(!empty($search) || isset($search)) {
						$sql = "SELECT * FROM `artist` artists
								INNER JOIN `description` infos ON infos.artist_id = artists.id
								WHERE `artist_name` LIKE '%".$search."%'
								";
					}

					// if nothing typed in, set query to all
					else {
						$sql = "SELECT * FROM `artist` artists
								  INNER JOIN `description` infos ON infos.artist_id = artists.id
								  ORDER BY `artist_name`
								  ";
					}

					foreach ($pdo->query($sql) as $row) {
						// give out detail page (description etc)
						echo '<div class="content__item">';
							echo '<div class="content__item-intro">';
								echo '<img class="content__item-img" src="img/artist/'.$row['images'].'.jpg" alt="Some image" />';
								echo '<h2 class="content__item-title">'.$row['artist_name'].'</h2>';
							echo '</div>';
							echo '<h3 class="content__item-subtitle">'.$row['quote'].'</h3>';
							echo '<h3 class="content__item-listeners"><i class="fab fa-spotify"></i>'.$row['listeners'].'</h3>';
							echo '<div class="content__item-text"><p>'.$row['description'].'</p></div>';
							?>
							<!-- calendar -->
							<?php echo '<h1 class="tour_date_title">'.TOUR_DATES.'</h1>'; ?>
							<div id="container" class="calendar-container" data-tippy-content="content tip"></div>
							<?php
							echo '<div id="event-cal-container_'.$row['id'].'" class="calendar-container"></div>';
							include 'calendar.php';
							echo "</div>"; } }
							
				// if empty show all
				else if(empty($search)) {
					foreach ($pdo->query($query) as $row) {
						// give out detail page
						echo '<div class="content__item">';
							echo '<div class="content__item-intro">';
								echo '<img data-fancybox="gallery_'.$row['artist_name'].'" href="img/artist/'.$row['images'].'.jpg" class="content__item-img" src="img/artist/'.$row['images'].'.jpg" alt="Some image" />';
								echo '<img data-fancybox="gallery_'.$row['artist_name'].'" href="img/artist/'.$row['images'].'_2.jpg" class="content__item-img" src="img/artist/'.$row['images'].'.jpg" alt="Some image" />';
								echo '<img data-fancybox="gallery_'.$row['artist_name'].'" href="img/artist/'.$row['images'].'_3.jpg" class="content__item-img" src="img/artist/'.$row['images'].'.jpg" alt="Some image" />';
								echo '<h2 class="content__item-title">'.$row['artist_name'].'</h2>';
							echo '</div>';
							echo '<h3 class="content__item-subtitle">'.$row['quote'].'</h3>';
							echo '<h3 class="content__item-listeners"><i class="fab fa-spotify"></i> '.$row['listeners'].'</h3>';
							echo '<div class="content__item-text"><p>'.$row['description'].'</p></div>';
							?>

							<!-- calendar -->
							<?php echo '<h1 class="tour_date_title">'.TOUR_DATES.'</h1>'; ?>
							<div id="container" class="calendar-container" data-tippy-content="content tip"></div>
							<?php
							echo '<div id="event-cal-container_'.$row['id'].'" class="calendar-container"></div>';
							include 'calendar.php';

				?>
				<?php echo "</div>"; } } ?>
				<button class="content__close"><i class="fas fa-times"></i></button>
				<svg class="content__indicator icon icon--caret"><use xlink:href="#icon-caret"></use></svg>
			</div>
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
		<script>
			$(".frame").sticky({ topSpacing: 0 });
		</script>

		<!-- AniJS Core File -->
    <script src="js/anijs-min.js"></script>
    <!-- ScrollReveal Helper -->
    <script src="js/anijs-helper-scrollreveal-min.js"></script>
	</body>
</html>
