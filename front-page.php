<?php get_header(); ?>
    <main class="container-fluid p-0">
        <section class="container-fluid panels-bg-hm bg-filler-one">
            <div class="container py-100">
                <div class="row">
                    <div class="col herocntnt">
                        <h3 class="md-h3 mb-3 text-uppercase">Welcome</h3>
                        <h1 class="lg-h1 mb-3 text-white">Morr Indoor Range and Training Center</h1>
                        <div class="row mb-4">
                            <div class="col-12 col-md-6">
                                <p class="lg-p text-white">Involvement in shooting sports inspires
                                    freedom, security, and confidence. We’ve created a
                                    safe experience for shooters of all skill levels. At
                                    Morr, we focus on learning the craft of shooting and
                                    having fun!</p>
                            </div>
                        </div>
                        <a class="btn cta-one text-uppercase" href="/the-guided-experience/">Schedule a Guided Experience</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid splitrow">
            <div class="row">
                <div class="col-12 col-md-6 cta-box pl-0">
                    <div class="position-relative panels-sub-bg bg-filler-two text-center py-100">
                        <h2 class="mb-5">New Shooters</h2>
                        <a class="btn cta-two text-uppercase" href="/first-time-shooter/">Click
                            Here</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 cta-box pr-0">
                    <div class="position-relative panels-sub-bg bg-filler-three text-center py-100">
                        <h2 class="mb-5">Experienced Shooters</h2>
                        <a class="btn cta-two text-uppercase" href="/range/">Click
                            Here</a>
                    </div>
                </div>
            </div>
            <div class="container py-100 px-0 px-md-1">
                <div class="row px-2 px-md-0">
                    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                        <img class="img-fluid"
                             src="/wp-content/uploads/2017/11/171121_MorrGunShop_403.jpg"/>
                    </div>
                    <div class="col-12 col-md">
                        <h3 class="sm-h3">Our first time at Morr...</h3>
                        <figure class="figure">
                            <blockquote class="blockqoute lg-p">
                                We had a great time. From the moment you enter the
                                building everyone is very professional and polite. The
                                firearms range is kept very well and the range safety
                                officers are on point to answer any questions you may
                                have.
                            </blockquote>
                            <figcaption class="figcaption">- Jen S. - Lancaster, PA
                            </figcaption>
                        </figure>
                        <a class="btn cta-three text-uppercase" target="blank"
                           href="https://www.google.com/search?q=Morr%20Range&ludocid=14868183439944585915#lrd=0x0:0xce566610493e12bb,1">Read
                            More Reviews</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid bg-green">
            <div class="container p-0">
                <div class="row pt-sm-100">
                    <div class="col-12 col-md-6 py-100 px-4">
                        <h2 class="sm-h2 mb-3 text-white">Firearms Training</h2>
                        <p class="lg-p mb-4 text-white">Shooting is both a sport and a
                            craft. Just like any other sport, once we learn the ropes and
                            the how-to’s, there's no end to the amount of enjoyment, and
                            aptitude we can build.</p>
                        <a class="btn cta-four text-uppercase" href="/training/">Learn
                            Morr</a>
                    </div>
                    <div class="col-12 col-md-6 panels-bg bg-filler-four order-first order-md-1">

                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid page p-0">
            <div class="panels-bg bg-filler-five">
                <div class="container py-100">
                    <div class="row">
                        <div class="col">
                            <h2 class="sm-h2 mb-3 font-raleway text-white">The Store</h2>
                            <p class="lg-p mb-4 text-white">Beginners and skilled shooters
                                alike will love our diverse selection of shooting sports
                                accessories, firearms, and sports accessories. Our service
                                team will make you feel welcome and has the expertise to
                                anwer your questions. That leaves us with one question for
                                you: When are you coming by? </p>
                            <p><a class="btn cta-five text-uppercase" href="/store/">Explore
                                The Store</a></p>
                            <a class="btn cta-two text-uppercase" href="/contact-us/">Visit
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid">
            <div class="container py-100">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sm-h2 mb-4">Featured Used Inventory</h2>
                        <div class="row mb-4">
							<?php
							$arg = array(
								'post_type'      => 'gun',
								'posts_per_page' => '4',
								'meta_query'     => array(
									array(
										'key'     => '_gun_featured',
										'value'   => 'on',
										'compare' => 'like'
									)
								)
							);
							query_posts( $arg );
							?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php
								$gun_details     = get_post_meta( $post->ID, '_gun_detials', false );
								$get_gallery_img = get_post_meta( $post->ID, '_easy_image_gallery' );
								$current_img     = wp_get_attachment_image( $get_gallery_img[0], 'front-page', false, array(
									"class" => "img-fluid mb-3",
									'alt'   => get_the_title()
								) );
								?>
                                <div class="col-6 col-md-3">
                                    <a href="<?php the_permalink() ?>">
										<?php if ( has_post_thumbnail() ) { ?><img
                                            class="card-img-top"
                                            src="<?php echo the_post_thumbnail_url( "front-page" ) ?>"
                                            alt="<?php echo get_the_title(); ?>" /><?php } else {
											echo ( $current_img != '' ) ? $current_img : '<img class="img-fluid mb-3" src="' . get_template_directory_uri() . '/assets/images/gun-placeholder.jpg" alt="' . get_the_title() . '" />';
										} ?>
                                        <h3 class="product-title"><?php the_title() ?></h3>
                                        <span class="product-price"><?php echo ( strpos( $gun_details[0][0], '$' ) ) ? $gun_details[0][0] : '$' . $gun_details[0][0]; ?></span>
                                    </a>
                                </div>
							<?php endwhile; endif; ?>
                        </div>
                        <a class="btn cta-three text-uppercase mr-5" href="/used-guns/">View Our Used Inventory</a><a class="btn cta-three text-uppercase" href="/sell-your-gun/">Sell Your Firearm</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>