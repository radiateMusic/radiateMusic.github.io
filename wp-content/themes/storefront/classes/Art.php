<?php

class Art {
	public $id, $src, $name, $wc_obj;

    public function __construct($wc_obj) 
    {
    	$this->id = $wc_obj->id;
    	$srcArray = get_the_terms( $this->id, 'art_source_path');
       	$this->src = $srcArray[0]->name;
       	$this->name = $wc_obj->get_title( );

    }
}
?>