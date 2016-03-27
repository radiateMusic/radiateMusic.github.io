<?php
/**
 * Template Name: Submission  page
 *
 */



	$args = array( 
				'post_type'				=> 'product',
				'post_status' 			=> 'publish',
				'ignore_sticky_posts'	=> 1,

				'tax_query' 			=> array(
			    	array(
				    	'taxonomy' 		=> 'pa_' . 'band-id',
						'terms' 		=> '1',
						'field' 		=> 'slug',
						'operator' 		=> 'IN'
					)
			    )
			);
	
	
	$products = new WP_Query( $args );

	while ( $products->have_posts() ) {
		$products->the_post();
		$prod[] = wc_get_product( $post->ID );
	} 
	$fabric_values = get_the_terms( $prod[0]->id, 'pa_song-path');
 
foreach ( $fabric_values as $fabric_value ) {
	  $path = $fabric_value->name;
}
		
get_header();
?>
<audio controls>
  <source src="<?php echo $path;?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>



<?php get_footer() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Submission Page</title>
</head>
<body>

<h2>Submit your work here</h2>


[contact-form-7 id="8" title="Contact form 1"] 


</body>
</html>

