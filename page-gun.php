<?php
    query_posts( 'post_type=gun&posts_per_page=12&paged='.$paged);
    $classes = strtolower(str_replace(' ','-',get_the_title()));
    get_header(); 
?>
<main id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
   <section id="title" class="title panels-bg bg-filler-one" <?php if ( has_post_thumbnail() ) { ?> style="background-image:url('<?php echo the_post_thumbnail_url("full");?>'"<?php } ?>>
        <div class="container py-100">
            <div class="row header-panel">
                <div class="col align-self-center">
                    <h2 class="xl-h2 text-center text-white text-uppercase"><?php echo get_the_title(); ?></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="container py-100">
            <div class="row">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php $get_gallery_img = get_post_meta( $post->ID, '_easy_image_gallery' ); 
                          $gun_details = get_post_meta($post->ID, '_gun_detials');?>
                    
                    <div class="col-6 mb-3 col-md-3">
                        <div class="card">
                            <?php $current_img = wp_get_attachment_image($get_gallery_img[0], 'store-page', false ,array( "class" => "card-img-top" )); ?>
                            <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()){ ?><img class="card-img-top" src="<?php echo the_post_thumbnail_url("store-page"); ?>" alt="Card image cap" /><?php } else { echo ($current_img != '')? $current_img : '<img class="card-img-top" src="' .get_template_directory_uri().'/assets/images/gun-placeholder.jpg" alt="Card image cap" />'; }?></a>
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <span class="d-block mb-3 gun-price"><?php echo (strpos($gun_details[0][0], '$'))? $gun_details[0][0] : '$'.$gun_details[0][0]; ?></span>
                                <?php remove_filter('the_excerpt', 'wpautop'); ?>
                                <p class="card-text"><?php the_excerpt() ?></p>
                                <div class="text-center mt-auto">
                                    <a href="<?php the_permalink(); ?>" class="btn cta-one text-uppercase">Learn Morr</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <div class="col-12 mt-4">
                    <?php b4st_pagination(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>