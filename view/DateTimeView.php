<?php

class DateTimeView {


	public function show() {
		// configuring date settings
		date_default_timezone_set('Europe/Stockholm');
		// From http://php.net/manual/en/function.date.php
		// l for day, j for 1-31, S for 1th-31th, F for month, Y for Year.
		// H for hour, i for minutes, s for seconds.
		$timeString = date('l') . ", the ". date('jS') ." of " . date('F Y');
		$timeString .= ", The time is " . date('H:i:s');

		return '<p>' . $timeString . '</p>';
	}
}