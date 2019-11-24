        <footer class="footer">
            <section class="container-fluid sign-up">
                <div class="container py-100">
                    <div class="row">
                        <div id="sign-up-form" class="col-12">
                            <h2 class="sm-h2 sign-up-h2">Get Morr</h2>
                            <p class="sign-up-p text-white mb-4">Sign up here to find out about events, products, and other helpful information</p>
                            
							<?php gravity_form( 3, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, 10, $echo = true ); ?>
                            <p class="lg-p text-center text-white">We respect your privacy and will never share your information.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container-fluid bottom-footer">
                <div class="container py-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <nav class="navbar navbar-expand p-0">
								<?php
                                  wp_nav_menu( array(
                                    'theme_location'  => 'main-menu',
                                    'container'       => false,
                                    'menu_class'	  => '',
                                    'fallback_cb'	  => '__return_false',
                                    'items_wrap'	  => '<ul id="%1$s" class="navbar-nav flex-column flex-md-row %2$s">%3$s</ul>',
                                    'depth'			  => 2,
                                    'walker'  	      => new b4st_walker_nav_menu()
                                  ) );
                                ?>
                            </nav>
                        </div>
						
                        <div class="col-12 mb-3 text-center text-md-left">
                            <a class="p-1 social-icon facebook" href="https://www.facebook.com/morrrange/" target="_blank"><span class="fa fa-facebook"></span></a>
                            <a class="p-1 social-icon instagram" href="https://www.instagram.com/morr_range/" target="_blank"><span class="fa fa-instagram" target="_blank"></span></a>
                            <a class="p-1 social-icon twitter" href="#"><span class="fa fa-twitter" target="_blank"></span></a>
                        </div>
				
                        <div class="col-12">
							<h4 class="text-white">Location</h4>
                            <p class="m-0 lg-p text-white text-center text-md-left">
                                2488 Willow Street Pk. Lancaster, PA 17602<br />
                                Phone Number: (717) 517-7135 
                            </p><br />
							<h4 class="text-white">Hours</h4>
							<p class="m-0 lg-p text-white text-center text-md-left">
Tuesday – Saturday 10am – 8pm<br />Sunday and Monday 11am – 6pm
							</p>
                        </div>
							<div style="margin: 20px 0 0 15px;">
						<p class="text-white" style="font-size:18px;font-weight:600;">Interested in a Career at Morr?</p>
						<a class="btn cta-four text-uppercase" href="/careers/">Apply Here</a>
					</div>
                    </div>
                </div>
            </section>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>