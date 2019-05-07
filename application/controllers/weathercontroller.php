<?php

class WeatherController extends Controller{

	
	public function index(){
		$this->set(result, false);
	}

	public function getresults(){

		$xml = simplexml_load_file('http://api.wunderground.com/api/cf8e96b2a0cb4032/conditions/q/'.$_POST['zip'].".xml");
		//var_dump($xml);
		//echo "zip".$_POST['zip'];
		//var_dump($xml);
		$this->set(result, true);
		$this->set(weather, $xml);




		
	}
	
}

?>