
<?php

/*
template name: music page
*/

?>
<?php

	$args = array( 
		'post_type'				=> 'musician',
    );

	
	$songsPosts = new WP_Query( $args );

	while ( $songsPosts->have_posts() ) {
		$songsPosts->the_post();
		$musician = new MusicianHandler($post->ID);
		$testMusicians[] = $musician;
	}

	wp_reset_postdata();
    $args = array(
        'posts_per_page' => 10,
        'product_cat' => 'songs',
        'post_type' => 'product',
    );
	$songs = new WP_Query( $args );

	while ($songs->have_posts()) {
		$songs->the_post();
		$obj = wc_get_product($post->ID);
		/*var_dump($obj);*/
		$songArray[] = new Song($obj);
	}
	wp_reset_postdata();
	
	

get_header(); ?>

<div class="site-container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<!-- <div class="homepageMuscicians"> -->

		<div class="clearboth"></div>
	</div>
	<div id="BotM">
	<?php 
		echo $testMusicians[1]->renderBotM();
		?>

</div>
<hr/>
<div class="blurb">
<h3>Did you know...</h3>
	<p>Something about the profits from every song purchase goes to the musician, not to Radiate.</p>
	</div>
<hr/>

<div class="ourPicks">
<h2>Today's Favorites</h2>
	<?php
	foreach ($songArray as $song) {
		echo $song->ourPickRender();
	}
?>
</div>
<div id="allbands">
	<h2 style="font-weight:bold;">All Bands</h2>
					<?php 

					//use this functionality for musicians
						foreach($testMusicians as $testMusician) {
							echo $testMusician->renderSubBand();
							
						}
					?>
</div>
				</div>

		</main><!-- #main -->
</div><!-- #primary -->

				
<?php get_footer() ?>