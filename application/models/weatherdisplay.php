<?php
class WeatherDisplay extends Model {



    protected $feed_url;

    protected $num_items;

    public function __construct($url){
        parent::__construct();

        $this->feed_url = $url;
    }

    public function getFeedItems(){
        $items = simplexml_load_file($this->feed_url);

        return $items;
    /*
    $rss = simplexml_load_file("https://fox59.com/feed");
    echo "<h1>".$rss->channel->title."</h1>";
    foreach($rss->channel->item as $item){
        echo $item->title."<br>".$item->link."<hr>";
    }
    */
    }
}
