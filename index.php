<?php
	if(!isset($_GET['member'])) {
		$member = "argo";
	} else {
		$member = $_GET['member'];
	}
?><!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		<!-- Meta Information -->
		<meta charset="UTF-8" />
		<meta name="robots" content="all" />
		<meta name="author" content="@ben_argo" />
		<meta name="copyright" content="2012 Ben Argo" />

		<!-- Page Title -->
		<title>ISP Availability</title>
		
		<link rel="stylesheet" href="styles/availability.css" />
		
		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script src="js/availability.js"></script>
	</head>
	<body>
		<header>
			<section class="members">
				<form action="availability.xml" method="post">
					<input type="submit" value="Print Document" />
				</form>
				<form action="index.php" method="get">
					<select name="member">
						<optgroup label="Team Members">
							<option value="argo" <?php if($member == "argo") { echo 'selected="selected"'; } ?>>Ben Argo</option>
							<option value="arnett" <?php if($member == "arnett") { echo 'selected="selected"'; } ?>>Ben Arnett</option>
							<option value="fursman" <?php if($member == "fursman") { echo 'selected="selected"'; } ?>>Anthony Fursman</option>
							<option value="jegtnes" <?php if($member == "jegtnes") { echo 'selected="selected"'; } ?>>Alex Jegtnes</option>
							<option value="khatun" <?php if($member == "khatun") { echo 'selected="selected"'; } ?>>Forida Khatun</option>
							<option value="money" <?php if($member == "money") { echo 'selected="selected"'; } ?>>Charlie Money</option>
						</optgroup>
					</select>
				</form>
			</section>
			<h1>ISP Easter Availability</h1>
		</header>
		
		<!-- Article -->
		<article>
			<p>This lightweight, XML-based application should help us determine what dates we have free throughout the holiday and exam period. Simply click on a square to change its status. White indicates you are free, whilst red indicates you are busy.</p>
			<?php
		
			// Load the availability XML file
			$xml = simplexml_load_file("availability.xml");
			
			// Loop through each week
			foreach($xml->week as $week) {
				
				// Print out the section tag
				echo '<section class="week" id="'. $week->attributes()->id .'">';
				
				// Loop through each day
				foreach($week->day as $day) {
					
					$person = $day->xpath("member[@id='". $member ."']");
					$member_name = $person[0]->attributes()->id;
					$free = $person[0]->attributes()->free;
					
					switch($free) {
						case "true":
							$status = "free";
							break;
						case "false":
							$status = "busy";
							break;
					}
					
					// Print out the opening day tag
					echo '<a href="#" class="day '. $member_name .' '. $status .'" id="'. $day->attributes()->date .'">';
					
					// Process the day of the week
					$weekday = ucfirst($day->attributes()->code);
					
					// Process the date
					$date = substr($day->attributes()->date, 3);
					
					// Process the month
					$month = substr($day->attributes()->date, 0, 2);
					switch($month) {
						case 04:
							$month = "April";
							break;
						case 05:
							$month = "May";
							break;
					}
					
					// Print out the date
					echo '<h3>'. $weekday .' '. $date .' '. $month .'</h3>';
				
					// Print out the closing day tag
					echo '</a>';
					
				} // End daily loop
					
				// Print out the closing section tag
				echo '</section>';
				
			} // End Weekly loop
		?></article>
		<!-- Article -->

		<!-- Footer -->
		<footer>
			<p>Copyright &copy; 2012 <a href="http://www.benargo.com/">Ben Argo</a>. Generated on <?php echo date("j F Y"); ?> at <?php echo date("H:i"); ?>. All the code can be found on <a href="https://github.com/benargo/isp-availability">Github</a>.</p>
		</footer>
		<!-- Footer -->
	</body>
</html>