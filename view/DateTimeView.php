<?php

class DateTimeView {


	public function show() {
	
	
		date_default_timezone_set("Europe/Stockholm");
		
		$timeString = date('l, \t\h\e jS \o\f F Y, \T\h\e \t\i\m\e \i\s H:i:s');  
		//Thursday, the 10th of September 2015, The time is 14:03:53
		//Thursday, the 10th of September 2015, The time is
		return '<p>' . $timeString . '</p>';
	}
}