<?php
/**
 * Template Name: band page
 *
 */

/*What needs to happen:
a query that selects all band ids and creates new musicians from it
create wp admin that creates band
*/
require get_stylesheet_directory() . '/classes/Musician.php';

$args = array( 
				'post_type'				=> 'musician',
			    );
	
	
		$songsPosts = new WP_Query( $args );

		while ( $songsPosts->have_posts() ) {
			$songsPosts->the_post();
			echo the_title();
			$songs = get_field('woocommerce_product');
		}

		var_dump($songs);
		
/*//create musician
$testMusicians[] = new Musician(1);
$testMusicians[] = new Musician(1);*/
get_header();
?>
<?php foreach ($testMusicians as $testMusician) { ?>
	<div class="band" id="<?php echo $testMusician->id ?>" style="border:thick solid; width: 300px;">
	<h3><?php echo $testMusician->name; ?></h3>
	<?php 
		$testMusician->loadSongs($obj);
	 	foreach($testMusician->songs as $song) { ?>
			<a href="<?php echo $song->src?>"><?php echo $song->name?></a><br/>
	<?php } ?>
</div>
<?php } ?>
<!-- <div class="band" id="">
	<?php foreach($testMusician->songs as $song) { ?>
		<a href="<?php echo $song->src?>"><?php echo $song->name?></a><br/>
	<?php } ?>
</div> -->
	<!-- <audio controls>
  		<source src="<?php echo $song->src?>" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio> -->





<?php get_footer() ?>