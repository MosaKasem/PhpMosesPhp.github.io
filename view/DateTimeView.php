<?php

class DateTimeView {


	public function show() {
		// configuring date settings
		date_default_timezone_set('Europe/Stockholm');
		// From 
		$date = "Today is " . date('l') . " of ". date('jS') ."/" . date('F Y');
		$date .= "<br> Time: " . date('H:i:s');
		// $timeString = "{$date['mday']}/{$date['mon']}/{$date['year']}";
		$timeString = $date;

		return '<p>' . $timeString . '</p>';
	}
}