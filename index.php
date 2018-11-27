<?php

// defenitions
$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', '');

$query = "SELECT*FROM `artist` ORDER BY `artist_name`";

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
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/foundation.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/app.css"/>

		<!-- js for player -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/foundation.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

		<!-- Icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


		<!-- <link rel="stylesheet" type="text/css" href="css/foundation.min.css"/> -->

		<!-- Include font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/foundation.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

		<!-- Include Amplitude JS -->
		<script type="text/javascript" src="js/amplitude.js"></script>

		<!-- Include Style Sheet -->
		<!-- <link rel="stylesheet" type="text/css" href="css/app.css"/> -->



		<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("U need a modern browser.");</script>
	</head>
	<body class="loading">
		<main>
			<div class="frame">
				<div class="title">
					<h3 class="title__name"><a href=""><img src="img/logo.png" width="100" alt="Logo"></a></h3>
				</div>
			</div>
			<h1 class="site_title">Webprojekt</h1>
			<div class="grid-wrap">
				<div class="grid">
					<?php

					foreach ($pdo->query($query) as $row) {
						echo '<a href="#" class="grid__item">';
							echo '<div class="grid__item-bg"></div>';
							echo '<div class="grid__item-wrap">';
								echo '<img class="grid__item-img" src="img/artist/'.$row['images'].'.jpg" alt="'.$row['artist_name'].'" />';
							echo '</div>';
							echo '<h3 class="grid__item-title">'.$row['artist_name'].'</h3>';
							echo '<h4 class="grid__item-number">'.$row['genre'].'</h4>';
						echo '</a>';
					}

					?>
				</div>
			</div>
			<div class="content">
				<?php

				foreach ($pdo->query($query) as $row) {
					echo '<div class="content__item">';
						echo '<div class="content__item-intro">';
							echo '<img class="content__item-img" src="img/artist/'.$row['images'].'.jpg" alt="Some image" />';
							echo '<h2 class="content__item-title">'.$row['artist_name'].'</h2>';
						echo '</div>';
						echo '<h3 class="content__item-subtitle">"Quote"</h3>';
						echo '<h3 class="content__item-listeners"><i class="fas fa-headphones-alt"></i>'.$row['listeners'].'</h3>';
						echo '<div class="content__item-text"><p></p></div>';
					echo '</div>';
				}

				?>
				<!-- <div class="music_player">
					<div id="white-player">
					  <div class="white-player-top">
						<div class="grid-x">
						  <div class="large-3 medium-3 small-3 cell">

						  </div>
						  <div class="large-6 medium-6 small-6 cell">
							<span class="now-playing">Läuft gerade</span>
						  </div>
						  <div class="large-3 medium-3 small-3 cell">
							<img src="img/show-playlist.svg" class="show-playlist"/>
						  </div>
						</div>
					  </div>

					  <div id="white-player-center">
						<img amplitude-song-info="cover_art_url" amplitude-main-song-info="true" class="main-album-art"/>

						<div class="song-meta-data">
						  <span amplitude-song-info="name" amplitude-main-song-info="true" class="song-name"></span>
						  <span amplitude-song-info="artist" amplitude-main-song-info="true" class="song-artist"></span>
						</div>

						<div class="time-progress">
						  <div class="grid-x">
							<div class="large-12 medium-12 small-12 cell">
							  <div id="progress-container">
								<input type="range" class="amplitude-song-slider" amplitude-main-song-slider="true"/>
									  <progress id="song-played-progress" class="amplitude-song-played-progress" amplitude-main-song-played-progress="true"></progress>
									  <progress id="song-buffered-progress" class="amplitude-buffered-progress" value="0"></progress>
							  </div>
							</div>
						  </div>

						  <div class="grid-x">
							<div class="large-6 medium-6 small-6 cell">
							  <span class="current-time">
									  <span class="amplitude-current-minutes" amplitude-main-current-minutes="true"></span>:<span class="amplitude-current-seconds" amplitude-main-current-seconds="true"></span>
									</span>
							</div>
							<div class="large-6 medium-6 small-6 cell">
							  <span class="duration">
									  <span class="amplitude-duration-minutes" amplitude-main-duration-minutes="true"></span>:<span class="amplitude-duration-seconds" amplitude-main-duration-seconds="true"></span>
									</span>
							</div>
						  </div>
						</div>
					  </div>

					  <div id="white-player-controls">
						<div class="grid-x">
						  <div class="large-12 medium-12 small-12 cell">
							<div class="amplitude-shuffle amplitude-shuffle-off" id="shuffle"></div>
							<div class="amplitude-prev" id="previous"></div>
							<div class="amplitude-play-pause" amplitude-main-play-pause="true" id="play-pause"></div>
							<div class="amplitude-next" id="next"></div>
							<div class="amplitude-repeat" id="repeat"></div>
						  </div>
						</div>
					  </div>

					  <div id="white-player-playlist-container">
						<div class="white-player-playlist-top">
						  <div class="grid-x">
							<div class="large-3 medium-3 small-3 cell">

							</div>
							<div class="large-6 medium-6 small-6 cell">
							  <span class="queue">Warteschlange</span>
							</div>
							<div class="large-3 medium-3 small-3 cell">
							  <img src="img/close.svg" class="close-playlist"/>
							</div>
						  </div>
						</div>

						<div class="white-player-up-next">Nächster Song</div>

						<div class="white-player-playlist">
						  <div class="white-player-playlist-song amplitude-song-container amplitude-play-pause" amplitude-song-index="0">
							<img src="img/covers/notalone.jpg"/>

							<div class="playlist-song-meta">
							  <span class="playlist-song-name">We're Not Alone</span>
							  <span class="playlist-artist-album">Virtual Riot &bull; We're Not Alone - EP</span>
							</div>
						  </div>
						</div>

						<div class="white-player-playlist-controls">
						  <img amplitude-song-info="cover_art_url" amplitude-main-song-info="true" class="playlist-album-art"/>

						  <div class="playlist-controls">
							<div class="grid-x">
							  <div class="large-6 medium-6 small-6 cell">
								<span amplitude-song-info="name" amplitude-main-song-info="true" class="song-name"></span>
								<span amplitude-song-info="artist" amplitude-main-song-info="true" class="song-artist"></span>
							  </div>
							  <div class="large-6 medium-6 small-6 cell">
								<div class="playlist-control-wrapper">
								  <div class="amplitude-prev" id="playlist-previous"></div>
								  <div class="amplitude-play-pause" amplitude-main-play-pause="true" id="playlist-play-pause"></div>
								  <div class="amplitude-next" id="playlist-next"></div>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div> -->
				<button class="content__close"><i class="fas fa-times"></i></button>
				<svg class="content__indicator icon icon--caret"><use xlink:href="#icon-caret"></use></svg>
			</div>
		</main>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/charming.min.js"></script>
		<script src="js/TweenMax.min.js"></script>
		<script src="js/demo.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
		<script type="text/javascript">
		  Amplitude.init({
			"songs": [
			  {
				"name": "We're Not Alone",
				"artist": "Virtual Riot",
				"album": "We're Not Alone - EP",
				"url": "music/werenotalone.mp3",
				"cover_art_url": "img/covers/notalone.jpg"
			  },
			]
		  });
		</script>
	</body>
</html>
