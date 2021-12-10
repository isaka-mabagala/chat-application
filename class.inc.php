<?php
//time and date
class dTime {
	
	public function printDate($format, $timestamp){
		$print = date($format, $timestamp);
		return $print;
	}
	
	public function chatTime($timestamp){
		$m = 60;
		$h = 60*60;
		$d = 24*60*60;
		$n = time();
		
		$timestamp = $timestamp;
		$min = floor(($n - $timestamp)/$m);
		$hrs = floor(($n - $timestamp)/$h);
		$day = floor(($n - $timestamp)/$d);
		
		if($min < 1){
			$time = 'just now';
			return $time;
		}
		if($min >= 1 && $min < 60){
			$time = $min.'min ago';
			return $time;
		}
		if($hrs == 1){
			$time = $hrs.'hr ago';
			return $time;
		}
		if($hrs > 1 && $hrs < 24){
			$time = $hrs.'hrs ago';
			return $time;
		}
		if($day ==1){
			$time = ' yesterday';
			return $time;
		}
		if($day > 1){
			$time = $this->printDate('M d', $timestamp);
			return $time;
		}
	}
}
$date = new dTime;

//user last seen
class lastSeen {
	
	public function printDate($format, $timestamp){
		$print = date($format, $timestamp);
		return $print;
	}
	
	public function _time($timestamp){
		
		$timestamp = $timestamp;
		$n = time();
		$count_sec = $n - $timestamp;
		$count_day = date('mdY', $n) - date('mdY', $timestamp);
		$today = 0;
		$yesterday = 10000;
		$max_day = 50000;
		$day = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		$day_replace = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
		
		if($count_sec <= 4){
			$time = 'online';
			return $time;
		}
		if($count_day == $today){
			$time = $this->printDate('g:i a', $timestamp);
			return 'active today '.$time;
		}
		if($count_day == $yesterday){
			$time = $this->printDate('g:i a', $timestamp);
			return 'active yesterday '.$time;
		}
		if($count_day > $yesterday && $count_day <= $max_day){
			$time = $this->printDate('g:i a', $timestamp);
			$day_week = $this->printDate("l", $timestamp);
			return 'active '.str_ireplace($day,$day_replace,$day_week).' '.$time;
		}
		if($count_day > $max_day){
			$time = $this->printDate('M d g:i a', $timestamp);
			return 'active '.$time;
		}
		
	}
}
$lastSeen = new lastSeen;

?>