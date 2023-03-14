<?php
// generate a string with the format “February 9th, 10th 11th, 2023” from start and end dates in PHP

$start_timestamp = strtotime($start_date);
$end_timestamp = strtotime($end_date);

// Check if the dates are equal
if ($start_timestamp == $end_timestamp) {
	// Format the start date with year
	$date_string = date('F jS, Y', $start_timestamp);
} else {
	// Get the difference between the years of the dates
	$year_diff = date('Y', $end_timestamp) - date('Y', $start_timestamp);

	// Check if the year difference is zero
	if ($year_diff == 0) {
		// Format the start date without year
		$start_date_formatted = date('F jS', $start_timestamp);
	} else {
		// Format the start date with year
		$start_date_formatted = date('F jS, Y', $start_timestamp);
	}

	// Format the end date with year
	$end_date_formatted = date('F jS, Y', $end_timestamp);

	// Concatenate the formatted dates
	$date_string = $start_date_formatted . " to " . $end_date_formatted;
}
echo $date_string;


// generate a string with the format “September 26th to October 4th 2022” from start and end dates in PHP with try & catch
function generate_date_string($start_date, $end_date) {
		// Use try block to execute the code
		try {
			// Create start and end date objects
			$start_date = new DateTime($start_date);
			$end_date = new DateTime($end_date);
	
			// Get the difference between the dates
			$date_diff = date_diff($start_date, $end_date);
	
			// Check if the dates are equal
			if ($date_diff->days == 0) {
				// Format the start date with year
				$date_string = date_format($start_date, 'F jS, Y');
			} else {
				// Get the difference between the years of the dates
				$year_diff = $date_diff->y;
	
				// Check if the year difference is zero
				if ($year_diff == 0) {
					// Format the start date without year
					$start_date_formatted = date_format($start_date, 'F jS');
				} else {
					// Format the start date with year
					$start_date_formatted = date_format($start_date, 'F jS, Y');
				}
	
				// Format the end date with year
				$end_date_formatted = date_format($end_date, 'F jS, Y');
	
				// Concatenate the formatted dates
				$date_string = $start_date_formatted . " to " . $end_date_formatted;
			}
	
			// Return result
			return $date_string;
		}
		// Use catch block to handle any errors that may occur
		catch (Exception $e) {
			// Throw a custom exception with a message
			throw new Exception("Invalid input: " . $e->getMessage());
		}
		// Use finally block to perform some cleanup actions
		finally {
			// Free up memory by destroying date objects
			unset($start_date);
			unset($end_date);
		}
	}
