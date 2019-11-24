<?php
    $classes = strtolower(str_replace(' ','-',get_the_title()));
    get_header()
?>
<main id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $gun_details = get_post_meta($post->ID, '_gun_detials', false );?>
        <section id="title" class="title panels-bg bg-filler-one <?php echo (!has_post_thumbnail())? 'first-gal-img' : ''; ?>" <?php if ( has_post_thumbnail() ) { ?> style="background-image:url('<?php echo the_post_thumbnail_url("full");?>'"<?php } ?>>
            <div class="container py-100">
                <div class="row header-panel">
                    <div class="col align-self-center">
                        <h2 class="xl-h2 text-center text-white text-uppercase"><?php the_title(); ?></h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid py-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex mb-4">
                        
                        <div class="nav-previous mr-auto"><?php previous_post_link(); ?></div>
                        <div class="nav-next ml-auto"><?php next_post_link(); ?></div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="row">
                        <?php if( easy_image_gallery() ): ?>
                            <div class="col-12 mb-5 justify-content-center">
                                <?php echo easy_image_gallery(); ?>
                            </div>
                        <?php endif; ?>
                            <div class="col-12">
                                <h3>Description:</h3>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="row">
                            <div class="col-3 col-md-12">
                                <h3>Price:</h3>
                                <span class="d-block mb-5 gun-price"><?php echo (strpos($gun_details[0][0], '$'))? $gun_details[0][0] : '$'.$gun_details[0][0]; ?></span>
                            </div>
                            <div class="col-12 where-to-buy">
                                <?php 
                                    $bool = false;
                                    for($i = 1; $i < count($gun_details[0]); $i++){ 
                                        if($gun_details[0][$i] != ''){
                                            $bool = true;
                                            break;
                                        }
                                    } 
                                    if($bool):
                                ?>
                                <h3 class="d-block text-orange">Where to buy:</h3>
                                <div class="row">
                                    <?php if($gun_details[0][1] != ''): ?>
                                    <div class="col-4 py-4 pl-4 col-md-12">
                                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-main.png" />
                                    </div>
                                    <?php endif; ?>
                                    <?php if($gun_details[0][2] != ''): ?>
                                    <div class="col-4 py-4 pl-4 col-md-12">
                                        <a href="<?php echo $gun_details[0][2]; ?>" target="_blank"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-gun-broker.png" /></a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($gun_details[0][3] != ''): ?>
                                    <div class="col-4 py-4 pl-4 col-md-12">
                                        <a href="<?php echo $gun_details[0][3]; ?>" target="_blank"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-ebay.png" /></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>