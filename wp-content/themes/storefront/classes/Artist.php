<?php


require get_stylesheet_directory() . '/classes/Art.php';
class Artists {
	public $id;
	public $artWork;
	public $name;
	
    public function __construct($id)
    {
        $this->id = $id;
        $this->name = "Mathew Samuel";
   
    }
     
    public function loadArt($wc_objs)
    {
    	foreach ($wc_objs as $wc_obj) {
    		$this->artWork[] = new Art($wc_obj);
    	}

    ?>