<?php
/*Template Name: home page*/




//do_shortcode('[select_musicians numberMusicians="10"]');

/*$musicians = do_shortcode('[select_musicians numberMusicians="10"]');
$artists = do_shortcode('[select_artists numberartists="10"]');*/



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

	$args = array(
        'posts_per_page' => 10,
        'product_cat' => 'shirts',
        'post_type' => 'product',
    );
	$shirts = new WP_Query( $args );

	while ($shirts->have_posts()) {
		$shirts->the_post();
		$obj = wc_get_product($post->ID);
		/*var_dump($obj);*/
		$shirtArray[] = new Shirt($obj);
	}
	wp_reset_postdata();
get_header(); ?>
	<?php masterslider(1); ?>
	<div class="site-container">
	

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="homepageSongs">
				<h2>New Music</h2>
					<?php 

					foreach ($songArray as $song) {
						echo $song->homePageRender();
					}

					?>
				</div>

				<div class="homepageArtists">
				<h2>New Designs</h2>
					<?php
						foreach ($shirtArray as $shirt) {
							echo $shirt->homePageRender();
						}
					?>
				</div>
				<div class="homepageBlurb">
					<h2>Who We Are</h2>
					<p>This is a blurb about Radiate and what we do. This is a blurb about Radiate and what we do. This is a blurb about Radiate and what we do. This is a blurb about Radiate and what we do.</p>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		
		<div class="clearboth"></div>
	</div>

<?php get_footer(); ?>
