<?php

// require basics
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


// set up the calendar
echo '<h1 class="tour_date_title">'.TOUR_DATES.'</h1>';

$event_date = '15-05-2019';
$event_title = 'Mai Event';



?>
<div id="container" class="calendar-container" data-tippy-content="content tip"></div>
<div id="event-cal-container" class="calendar-container"></div>

<script>
	$(document).ready(function () {
		// Event Demo init
		$("#event-cal-container").simpleCalendar({
			events: ['<?php echo $event_date; ?>'],
			eventsInfo: ['<?php echo $event_title; ?>'],
			selectCallback: function(date){
				console.log('date selected '+date);
			}
		});

		tippy('.day.event', {
			theme: 'translucent',
		});
	});
</script>
