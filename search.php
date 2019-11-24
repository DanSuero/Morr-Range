<?php
/*
Template Name: Search
*/
?>
<?php
	wpdocs_custom_excerpt_length(55);
	$classes = strtolower(str_replace(' ','-',get_the_title()));
	get_header(); 
?>
<main id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
<?php 	
		$s = get_search_query();
		$args = array( 's' => $s );
		$the_query = new WP_Query( $args );
?>		
	<section id="title" class="title panels-bg bg-filler-one" <?php if ( has_post_thumbnail() ) { ?> style="background-image:url('<?php echo the_post_thumbnail_url("full");?>'"<?php } ?>>
		<div class="container py-100">
			<div class="row header-panel">
				<div class="col align-self-center">
					<h2 class="xl-h2 text-center text-white text-uppercase"><?php get_the_title(); ?></h2>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid">
		<div class="container py-100">
			<?php if ( $the_query->have_posts() ): ?>
			<h2>Search Results for: <?php echo get_query_var('s'); ?></h2>
			<div class="row">
				<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
				<div class="col-12 mb-5">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
				</div>
				<?php endwhile; ?>
				<div class="col-12">
					 <?php echo paginate_links(); ?>
				</div>
			</div>
			<?php else: ?>
			<div class="row">
				<div class="col-12">
					<h3>Nothing Found</h3>
					<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>