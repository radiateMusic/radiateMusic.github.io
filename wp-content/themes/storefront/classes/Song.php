<?php

class Song {
	public $id, $src, $name, $wc_obj;

    public function __construct($wc_obj) 
    {
    	$this->id = $wc_obj->id;
    	$srcArray = get_the_terms( $this->id, 'pa_song-path');
       	$this->src = $srcArray[0]->name;
       	$this->name = $wc_obj->get_title( );

    }
}
?>