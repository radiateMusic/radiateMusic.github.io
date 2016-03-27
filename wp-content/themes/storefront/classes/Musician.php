<?php

require get_stylesheet_directory() . '/classes/Song.php';
class Musician12 {
	public $id;
	public $songs;
	public $name;
	//Until I create the admin section to create new bands this can be used by
	//manually passing an id to it
    public function __construct($id)
    {
        $this->id = $id;
        $this->name = "Test Band";
   
    }
     
    public function loadSongs($wc_objs)
    {
    	foreach ($wc_objs as $wc_obj) {
    		$this->songs[] = new Song($wc_obj);
    	}
    	
    	/*$args = array( 
				'post_type'				=> 'product',
				'post_status' 			=> 'publish',
				'ignore_sticky_posts'	=> 1,

				'tax_query' 			=> array(
			    	array(
				    	'taxonomy' 		=> 'pa_band-id',
						'terms' 		=> $this->id,
						'field' 		=> 'slug',
						'operator' 		=> 'IN'
					)
			    )
			);
	
	
		$songsPosts = new WP_Query( $args );

		while ( $songsPosts->have_posts() ) {
			$songsPosts->the_post();
			$prod = wc_get_product( $post->ID );
			var_dump($prod);
			$this->songs[] = new Song(wc_get_product( $post->ID ));
		}*/

    }
}