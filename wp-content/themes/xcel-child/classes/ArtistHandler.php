<?php

require get_stylesheet_directory() . '/classes/Shirt.php';
class ArtistHandler {
	public $id;
	public $shirts = array();
	public $name;

    public function __construct($id)
    {
        $this->id = $id;
        $this->name = get_the_title($id);
         $this->description = get_field('artist_description', $this->id);

        //load all woocommerce objects attached to this post
    	$shirt_posts = get_field('artist_woocommerce_product',$this->id);

    	foreach ($shirt_posts as $sp) {
    		$shirts[] = wc_get_product($sp->ID);
    	}
		$this->shirts = $this->loadShirts($shirts);
    }
    //loads shirt object array from an array of wc objects
    public function loadShirts($wc_objs)
    {
    	foreach ($wc_objs as $wc_obj) {
    		$shirtsArray[] = new Shirt($wc_obj);
    	}
    	return $shirtsArray;
    }
    public function displayShirt() {
        return  $this->shirts[0]->img;
    }

    public function renderBotM() {

        $shirts = $this->shirts;
        $html = '<div class="artist" id="' . $this->id . '" style="margin-top:2%">';
        $html .= '<div id="featuredleft">';
        $html .=    '<h2>' . $this->name . '</h2>';
        $html .=    $this->shirts[0]->img;
        $html .= '</div>';
        $html .= '<div id="featuredright">';
        $html .= '<p id="BotMDesc">' . $this->description . '</p><a id="readmore" href="javascript:void(0)">Read More --></a>';
        $html .= '<h3>Other Designs</h3>';
        $html .= "<ul class='songList'>";
        foreach ($shirts as $shirt) {
           $html .= $shirt->renderBotM();
        }
        $html .="</ul>";
        $html .= '</div>';
        $html .= '</div>';

        return $html;

    }

    public function renderSubArtist() {
        $html = '<div class="subArtist" id="' . $this->id . '">';
        $html .=    '<h2>' . $this->name . '</h2>';
        $html .=    '<div class="subArtistImg">' . $this->shirts[0]->img . '</div>';
        $html .=    '<span class="price">$19.99</span>';
        $html .= '<a href="" class="addToCart">Add To Cart</a>';
        $html .= '<p>Small description about artist. Small description about artist</p>';
        $html .= '</div>';

        return $html;

    }
}