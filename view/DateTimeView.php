<?php

class DateTimeView {


	public function show() {
		// Setting Date
		date_default_timezone_set('Europe/Stockholm');

		$date = getdate();
		$timeString = "today is: {$date['mday']}/{$date['mon']}/{$date['year']}";

		return '<p>' . $timeString . '</p>';
	}
}