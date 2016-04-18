<?php

class Shirt {
	public $id, $name, $wc_obj, $thumbnail, $artist_id;

    public function __construct($wc_obj) 
    {
    	$this->wc_obj = $wc_obj;
    	$this->id = $wc_obj->get_id();
       	$this->name = $wc_obj->get_title( );
       	$artistArray = get_the_terms( $this->id, 'pa_artist-id');
        $this->artist_id = $artistArray[0]->name;
       	$this->img = get_the_post_thumbnail ($this->id);
    }


    public function getImg() {
        $this->img = get_the_post_thumbnail ($this->id);
        return $this->img;
    }

    public function getArtistName() {
        $nameArray = get_the_terms( $this->id, 'pa_artist-name');
        return $nameArray[0]->name;
    }

    public function getArtistSlug() {
        $post = get_post($this->artist_id);
        $slug = $post->post_name;
        return $slug;
    }

    public function homePageRender() {
        $img = $this->getImg();
        $slug = $this->getArtistSlug();
        $artist_name = $this->getArtistName();

        $html = '<div class="homeShirtContainer">';
        $html .= $img;
        $html .= '<span class="homeShirtOverlay">';
        $html .= '<p>' . $this->name . '</p>';
        //$html .= '<a href="/music/#'. $slug .'">' . $band_name . '</a>';
        $html .= '</span>';
    	$html .= '</div>';

        /*$html .= '';
        $html .= '';*/
        return $html;
    }

    public function renderBotM() {
         $img = $this->getImg();
        $slug = $this->getArtistSlug();
        $html = '<div class="botmSongContainer">';
        $html .= $img;
            $html .= '<element class="playButton"></element>';
            $html .= '<p>' . $this->name . '</p>';
        $html .= '</div>';
        return $html;
    }

    public function renderSubBand() {
        
        $html = $this->button;
        return $html;
    }
}
?>