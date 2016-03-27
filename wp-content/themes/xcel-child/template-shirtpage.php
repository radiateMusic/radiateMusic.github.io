<?php
/**
 * Template Name: Shirt Page
 *
 */
?>
<!-- <div id="mediaplayer">
<audio controls id="mp">
  <source id="mps" src=" " type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<p id="mpt"></p>	
</div> -->
<?php

	$args = array( 
		'post_type'				=> 'artist',
    );

	
	$shirt_Posts = new WP_Query( $args );

	while ( $shirt_Posts->have_posts() ) {
		$shirt_Posts->the_post();
		$artist = new ArtistHandler($post->ID);
		$testArtists[] = $artist;
	}
	
	

get_header(); ?>

<div class="site-container">

<div id="primary" class="content-area">
	<main id="main" class-"site-main" role="main">
	<div id="BotM">
		<?php
		echo $testArtists[1]->renderBotM();
		?>
	</div>
	<hr/>
	<div class="blurb">
	<h3>Did you know...</h3>
	<p>Something about the profits from every shirt purchase goes to the artist, not to Radiate.</p>
	</div>
	<hr/>
	<div id="allartists">
		<h2 style="font-weight:bold">All Designs</h2>
		<br/>
		<?php
		foreach($testArtists as $testArtist){
			echo $testArtist->renderSubArtist();
		}
		?>
	</div>
</div>

</main>
<div class="clearboth"></div>
</div>

<?php get_footer() ?>