<?php

class HomeController extends Controller{
	
	public function index(){
		$feed = "http://webhose.io/filterWebContent?token=58912373-2fcf-4be0-97bf-d566a2074f79&format=xml&sort=crawled&q=site%3Acnn.com";
		$rss = new RssDisplay($feed);

		$feed_data = $rss->getFeedItems();
		
		$objNews = array();
		//url link 
		for($i = 0; $i<8;$i++){	
		$element = $feed_data->posts->post[$i];
		
		$objNews[$i] = array(
			'date' => $publish_date[$i] = $element->published,
			'title' => $channel_title[$i] = $element->title,
			'text' => $channel_text[$i] = $element->text
		);		
		}
		//$channel_title = $feed_data->channel->title;
		
		

		$this->set('rss_array', $objNews);
	}


	
}

?>
