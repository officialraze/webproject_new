<?php

// session information
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
		  INNER JOIN `events` events ON events.artist_id = artists.id
		  ";
?>

<script>
	$(document).ready(function () {
		<?php

		// return calendar for each artist
		foreach ($pdo->query($query) as $row) {
			if (is_array($row) && !empty($row)) { ?>
				$("#event-cal-container_<?php echo $row['artist_id'];?>").simpleCalendar({
					events: ['<?php echo $row['start_date']; ?>'],
					eventsInfo: ['<?php echo $row['title']; ?>'],
					selectCallback: function(date){
						console.log('date selected '+date);
					}
				});
			<?php }
		}

		?>
		// for tiptool
		tippy('.day.event', {
			theme: 'translucent',
		});
	});
</script>
