<?php

require '../config.php';

session_start();
if (!isset($_SESSION['userid'])) {
	if(!isset($_SESSION['userid'])) {
	    die('Bitte zuerst <a href="../login.php">einloggen</a>');
	}
}

if (isset($_SESSION['userid'])) {
	$user_id = $_SESSION['userid'];
}

if (HOME == true) {
	$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', 'root');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "artists";
}
else {
	$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', '');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "artists";
}

$band_query = "SELECT * FROM `artist` artists
INNER JOIN `description` infos ON infos.artist_id = artists.id
WHERE `id` = $user_id";

$stats_query = "SELECT * FROM `artist` artists
INNER JOIN `stats` stats ON stats.artist_id = artists.id
WHERE `id` = $user_id";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard - Webprojekt 2.0</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../favicon.ico" />
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href=""><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
				  <img src="../img/artist/round/<?php
  					foreach ($pdo->query($band_query) as $row) {
  						echo $row['images'];
  					}
  				?>.jpg" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">
					<?php
						foreach ($pdo->query($band_query) as $row) {
							echo $row['artist_name'];
						}
					?>
				</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../logout.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Abmelden
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
		  <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="../index.php">
              <i class="mdi mdi-home"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="../logout.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="../img/artist/round/<?php
					foreach ($pdo->query($band_query) as $row) {
						echo $row['images'];
					}
				?>.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">
					<?php
						foreach ($pdo->query($band_query) as $row) {
							echo $row['artist_name'];
						}
					?>
				</span>
                <span class="text-secondary text-small">Künstler</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <a href="../logout.php" class="btn btn-block btn-lg btn-gradient-primary mt-4">Abmelden</a>
            </span>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <a href="" style="color: #fff;"><i class="mdi mdi-home"></i></a>
              </span>
              Dashboard von <?php
				  foreach ($pdo->query($band_query) as $row) {
					  echo $row['artist_name'];
				  }
			  ?>
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>Dashboard
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Umsatz (letzte 7 Tage)
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">
					<?php
						foreach ($pdo->query($stats_query) as $row) {
							echo '$'.$row['sales'];
						}
					?>
                  </h2>
                  <h6 class="card-text">Erhöht um 4%</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Wöchentliche Plays
                    <i class="mdi mdi-music-note mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">
				  	<?php
						foreach ($pdo->query($stats_query) as $row) {
							echo $row['plays'];
						}
					?>
                  </h2>
                  <h6 class="card-text">Gesunken um 3%</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Monatliche Zuhörer
                    <i class="mdi mdi-headphones mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">
					  <?php
  						foreach ($pdo->query($stats_query) as $row) {
  							echo $row['listeners'];
  						}
  					?>
                  </h2>
                  <h6 class="card-text">Gesunken um 8%</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Biographie anpassen</h4>
						<form class="content_artist" method="post">

							<textarea type="text" name="content_description" id="editor">
								<?php
								// description in ckeditor
								foreach ($pdo->query($band_query) as $row) {
			  					  echo $row['description'];
				  				  }
								?>
							</textarea>
							<br>

							<h4 class="card-title">Zitat anpassen</h4>

							<textarea name="content_quote" id="editor_quote"><?php
								// description in ckeditor
								foreach ($pdo->query($band_query) as $row) {
			  					  echo $row['quote'];
			  				  }
							?></textarea>
							<br>

							<input class="btn" type="submit" name="save" value="Speichern">
						</form>

						<?php

							if(!empty($_POST) || !empty($_POST['content_description']) || !empty($_POST['content_quote'])) {
								$content_description = $_POST['content_description'];
								$content_quote = $_POST['content_quote'];

								// Create connection
								$conn = new mysqli($servername, $username, $password, $dbname);
								// Check connection
								if ($conn->connect_error) {
								    die("Connection failed: " . $conn->connect_error);
								}

								if (!empty($_POST)) {
									// $sql = "UPDATE `description` SET `description`= '".$content_description."', `quote`= '".$content_quote."' WHERE `artist_id`= '".$user_id."'";
									$sql = "UPDATE `description` SET `description`='".$content_description."',`quote`='".$content_quote."' WHERE `artist_id` = $user_id";
									if ($conn->query($sql) == TRUE) {
										header("refresh: 0");
									    echo "Daten wurden erfolgreich aktualisiert";
									}
									else {
									    echo "Fehler beim Aktualisieren der Daten: " . $conn->error;
									}
								}

								$conn->close();
							}
						 ?>
					</div>
				</div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Youtube Video</h4>
				  <div class="youtube_iframe">
					  <?php
						$url = "https://www.youtube.com/watch?v=eTUizYzQOWk";
						parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
					  ?>
					  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  </div>
				  <form class="youtube_url" action="index.php" method="post">
					  <input id="editor_youtube" type="text" name="url" value="URL einfügen"><br>
					  <input class="btn" type="submit" name="submitter" value="Speichern">
				  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bilder</h4>
                  <div class="d-flex">
                    <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                      <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                      <span>raze.exe</span>
                    </div>
                    <div class="d-flex align-items-center text-muted font-weight-light">
                      <i class="mdi mdi-clock icon-sm mr-2"></i>
                      <span><?php echo date("d.F.Y") ?></span>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 pr-1">
                      <!-- <img src="images/dashboard/img_1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                      <img src="images/dashboard/img_4.jpg" class="mw-100 w-100 rounded" alt="image"> -->
                    </div>
                    <div class="col-6 pl-1">
                      <!-- <img src="images/dashboard/img_2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                      <img src="images/dashboard/img_3.jpg" class="mw-100 w-100 rounded" alt="image"> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><strong><?php echo date('Y'); ?></strong> © by Melvin Lauber</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->


  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

	ClassicEditor
        .create( document.querySelector( '#editor_quote' ) )
        .catch( error => {
            console.error( error );
	        } );

	ClassicEditor
        .create( document.querySelector( '#editor_youtube' ) )
        .catch( error => {
            console.error( error );
	        } );
</script>
</body>

</html>
