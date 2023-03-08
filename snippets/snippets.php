<?php
// generate a string with the format “February 9th, 10th 11th, 2023” from start and end dates in PHP

$start = new DateTime("2023-02-09");
$end = new DateTime("2023-02-24");
$output = "";
while ($start <= $end) {
	if ($output == "") {
		// First date
		$output .= $start->format("F jS");
	} elseif ($start->format("j") == $end->format("j")) {
		// Last date
		$output .= ", " . $start->format("jS Y");
	} else {
		// Middle dates
		$output .= ", " . $start->format("jS");
	}
	// Increment the start date by one day
	$start->modify("+1 day");
}
echo $output;


// generate a string with the format “September 26th to October 4th 2022” from start and end dates in PHP with try & catch
try {
	// Create a DateTime object for the start date and another one for the end date
	$start = new DateTime("2022-09-26");
	$end = new DateTime("2022-10-04");

	// Format the start date according to your desired output
	$output = $start->format("F jS"); // September 26th

	// Check if the start date and the end date have different months
	if ($start->format("m") != $end->format("m")) {
		// Different months
		// Append "to" and the end date with full month name
		$output .= " to " . $end->format("F jS Y"); // September 26th to October 4th 2022
	} else {
		// Same month
		// Append "-" and the end date with only day name
		$output .= " - " . $end->format("jS Y"); // September 26th - 30th 2022
	}

	echo $output;
} catch (Exception $e) {
	// Handle any exceptions that may occur
	echo "Error: " . $e->getMessage();
}
