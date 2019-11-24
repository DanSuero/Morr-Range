<?php
    remove_filter( 'the_content', 'wpautop' );
    $classes = strtolower(str_replace(' ','-',get_the_title()));
    get_header(); 
?>
<main id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <section id="title" class="title panels-bg bg-filler-one" <?php if ( has_post_thumbnail() ) { ?> style="background-image:url('<?php echo the_post_thumbnail_url("full");?>'"<?php } ?>>
            <div class="container py-100">
                <div class="row header-panel">
                    <div class="col align-self-center">
                        <h2 class="xl-h2 text-center text-white text-uppercase"><?php the_title(); ?></h2>
                    </div>
                </div>
            </div>
        </section>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>