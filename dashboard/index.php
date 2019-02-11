<?php

session_start();
if (!isset($_SESSION['userid'])) {
	if(!isset($_SESSION['userid'])) {
	    die('Bitte zuerst <a href="../login.php">einloggen</a>');
	}
}

if (isset($_SESSION['userid'])) {
	$user_id = $_SESSION['userid'];
}

$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', 'root');

$band_query = "SELECT * FROM `artist` artists
INNER JOIN `description` infos ON infos.artist_id = artists.id
WHERE `id` = $user_id";

// defenitions
$pdo = new PDO('mysql:host=localhost;dbname=artists', 'root', 'root');

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
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <span class="menu-title">Icons</span>
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <span class="menu-title">Forms</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <span class="menu-title">Charts</span>
              <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <span class="menu-title">Tables</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">Sample Pages</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
              <div class="mt-4">
                <div class="border-bottom">
                  <p class="text-secondary">Categories</p>
                </div>
                <ul class="gradient-bullet-list mt-4">
                  <li>Free</li>
                  <li>Pro</li>
                </ul>
              </div>
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
                  <h4 class="font-weight-normal mb-3">Umsatz
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">$50</h2>
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
                  <h2 class="mb-5">300</h2>
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
                  <h2 class="mb-5">3'400</h2>
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
						<textarea name="content" id="editor"><?php
							// description in ckeditor
							foreach ($pdo->query($band_query) as $row) {
		  					  echo utf8_encode($row['description']);
		  				  }
						?></textarea>
						<br>
						<h4 class="card-title">Zitat anpassen</h4>
						<textarea name="content" id="editor_quote"><?php
							// description in ckeditor
							foreach ($pdo->query($band_query) as $row) {
		  					  echo $row['quote'];
		  				  }
						?></textarea>
						<br>
						<button type="button" class="btn btn-gradient-success btn-fw">Speichern</button>
					</div>
				</div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Beliebte Songs</h4>
				  <ul class="list-arrow">
				  	<li>Ocean</li>
					<li>Coffee</li>
					<li>Storm</li>
				  </ul>
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
                      <img src="images/dashboard/img_1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                      <img src="images/dashboard/img_4.jpg" class="mw-100 w-100 rounded" alt="image">
                    </div>
                    <div class="col-6 pl-1">
                      <img src="images/dashboard/img_2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                      <img src="images/dashboard/img_3.jpg" class="mw-100 w-100 rounded" alt="image">
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
</script>
</body>

</html>
