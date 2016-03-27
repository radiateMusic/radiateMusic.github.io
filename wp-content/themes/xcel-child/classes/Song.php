<?php

class Song {
    public $id, $src, $name, $wc_obj, $img, $band_name, $band_id;


    public function __construct($wc_obj) 
    {
        $this->wc_obj = $wc_obj;

        $this->id = $wc_obj->get_id();

        $srcArray = get_the_terms( $this->id, 'pa_song-path');
        $this->src = $srcArray[0]->name;

        
        $bandArray = get_the_terms( $this->id, 'pa_band-id');
        $this->band_id = $bandArray[0]->name;
        
        $this->name = $wc_obj->get_title( );
        $this->button = '<li audiourl="'. $this->src .'" class="song"><img src="http://localhost/radiate/wp-content/uploads/2016/01/test-play-button.jpg"><i class="fa fa-shopping-cart" style="margin-right: 15px;"></i>'. $this->name . '</li>';
    }
   
   
    public function renderBotM() {
         $img = $this->getImg();
        $slug = $this->getBandSlug();
        $band_name = $this->getBandName();
        $html = '<div class="botmSongContainer">';
            $html .= $img;
            //$html .= '<span class="homeSongOverlay">';
           /* $html .= '<a href="/music/#'. $slug .'">' . $band_name . '</a>';*/
            //$html .= '</span>';
            $html .= '<element class="playButton"><img class="song" audiourl="'. $this->src .'" src="http://localhost/radiate/wp-content/uploads/2016/01/test-play-button.jpg"></element>';
            $html .= '<p>' . $this->name . '<i class="fa fa-shopping-cart" style="    margin-left: 36%;"></i></p>';
        $html .= '</div>';
        return $html;
    }

    public function renderSubBand() {
        
        $html = $this->button;
        return $html;
    }

    public function getImg() {
        $this->img = get_the_post_thumbnail ($this->id);
        return $this->img;
    }

    public function getBandName() {
        $nameArray = get_the_terms( $this->id, 'pa_band-name');
        return $nameArray[0]->name;
    }

    public function getBandSlug() {
        $post = get_post($this->band_id);
        $slug = $post->post_name;
        return $slug;
    }


    public function homePageRender() {
        $img = $this->getImg();
        $slug = $this->getBandSlug();
        $band_name = $this->getBandName();

        $html = '<div class="homeSongContainer">';
            $html .= $img;
            $html .= '<span class="homeSongOverlay">';
            $html .= '<p>' . $this->name . '</p>';
            $html .= '<a href="/music/#'. $slug .'">' . $band_name . '</a>';
            $html .= '</span>';
            $html .= '<element class="playButton"><img class="song" audiourl="'. $this->src .'" src="wp-content/uploads/2016/01/test-play-button.jpg"></element>';
        $html .= '</div>';

        /*$html .= '';
        $html .= '';*/
        return $html;
    }

    public function ourPickRender() {
        $img = $this->getImg();
        $slug = $this->getBandSlug();
        $band_name = $this->getBandName();
        $html = '<div class="ourPickContainer">';
            $html .= $img;
            //$html .= '<span class="homeSongOverlay">';
           /* $html .= '<a href="/music/#'. $slug .'">' . $band_name . '</a>';*/
            //$html .= '</span>';
            $html .= '<element class="playButton"><img class="song" audiourl="'. $this->src .'" src="http://localhost/radiate/wp-content/uploads/2016/01/test-play-button.jpg"></element>';
            $html .= '<p style="margin-left:20%;">' . $this->name . '<i class="fa fa-shopping-cart" style="    margin-left: 25%;"></i></p>';
        $html .= '</div>';
        return $html;
    }

}

?>  
