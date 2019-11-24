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
                       
                    </div>
                </div>
            </div>
        </section>
        <section class="contianer py-100">
            <p>Nothing found for the requested page. Try a search instead?</p>
        </section>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>