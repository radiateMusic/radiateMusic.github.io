<?php

require get_stylesheet_directory() . '/classes/Song.php';
class MusicianHandler {
	public $id;
	public $songs = array();
	public $name;
    public $img;
    public $description;

    public function __construct($id)
    {
        $this->id = $id;
        $this->name = get_the_title($id);
        $this->img = get_the_post_thumbnail ($id);
        $this->description = get_field('musician_description', $this->id);

        //load all woocommerce objects attached to this post
    	$song_posts = get_field('musician_woocomemrce_product',$this->id);
    	foreach ($song_posts as $sp) {
    		$songs[] = wc_get_product($sp->ID);
    	}
		$this->songs = $this->loadSongs($songs);
    }
    //loads song object array from an array of wc objects
    public function loadSongs($wc_objs)
    {
    	foreach ($wc_objs as $wc_obj) {
    		$songsArray[] = new Song($wc_obj);
    	}
    	return $songsArray;
    }

    public function renderBotM() {

        $songs = $this->songs;
        $html = '<div class="musician" id="' . $this->id . '">';
        $html .= '<div id="featuredleft">';
        $html .=    '<h2>' . $this->name . '</h2>';
        $html .=    $this->img;
        $html .= '</div>';
        $html .= '<div id="featuredright">';
        $html .= '<p id="BotMDesc">' . $this->description . '</p><a id="readmore" href="javascript:void(0)">Read More --></a>';
        $html .= '<h3>Notable Tracks</h3>';
        $html .= "<ul class='songList'>";
        foreach ($songs as $song) {
           $html .= $song->renderBotM();
        }
        $html .="</ul>";
        $html .= '</div>';
        $html .= '</div>';

        return $html;

    }


    public function renderSubBand() {

        $songs = $this->songs;
        $html = '<div class="musicianAB" id="' . $this->id . '">';
        $html .=    '<div class="subMusicianImg">' . $this->img . '</div>';
        $html .=    '<h2>' . $this->name . '</h2>';
        $html .= "<ul class='songList'>";
        foreach ($songs as $song) {
           $html .= $song->renderSubBand();
        }
         $html .= "</ul>";
        $html .= '</div>';

        return $html;

    }
}