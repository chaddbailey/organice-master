<?php

namespace App;

class Count{

	

	public function getLocationPoints($distance){
		$points = 100;
		$counter = 0;
		for($counter = 0; $counter <= $distance; $counter++){
			$points = $points - 1;
			$counter = $counter + 499;
		}
		if($points <= 0){
			$points = 0;
		}
		return $points;
		
	}

	
}