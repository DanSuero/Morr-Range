<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Morr Range | Shooting Range and Gun Store in Lancaster, PA</title>
    <?php wp_head(); ?>
	
	<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "name": "Morr Range",
  "image": "https://morrrange.com/wp-content/themes/morrRange/assets/images/logo-main.png",
  "url": "https://www.morrrange.com",
  "telephone": "(717) 517-7135",
  "priceRange": "$$",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "2488 Willow Street Pike",
    "addressLocality": "Lancaster",
    "addressRegion": "PA",
    "postalCode": "17602",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 39.99251539999999,
    "longitude": -76.2861105
  },
  "openingHoursSpecification": [{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Monday",
    "opens": "10:00",
    "closes": "18:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Tuesday",
    "opens": "10:00",
    "closes": "20:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Wednesday",
    "opens": "10:00",
    "closes": "20:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Thursday",
    "opens": "10:00",
    "closes": "20:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Friday",
    "opens": "10:00",
    "closes": "20:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Saturday",
    "opens": "10:00",
    "closes": "20:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Sunday",
    "opens": "10:00",
    "closes": "18:00"
  }],
  "sameAs": [
    "https://www.facebook.com/morrrange/",
    "https://www.instagram.com/morr_range/"
  ]
}
</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-102195945-2"></script>
			<script>
 				window.dataLayer = window.dataLayer || [];
  				function gtag(){dataLayer.push(arguments);}
  				gtag('js', new Date());

  				gtag('config', 'UA-102195945-2');
			</script>
			<meta name="google-site-verification" content="2LKcrG_CcXLBL4rZ8y4lF_HM_sXHpENqCkRUzG-2UlI" />
</head>

<body <?php body_class(); ?>>
	
<?php if( get_field('alert_text', 'option') ): ?>
				<div class="text-center pt-3" style="background:#d85d36;height:50px;width:100%">
					<a href="<?php the_field('alert_link', 'option'); ?>" class="text-white"><?php the_field('alert_text', 'option'); ?></a>
				</div>
			<?php endif; ?>
	
	
				
			

	
	<header class="header">
            <div class="container">
                <div class="row py-4 nav-wrapper">
                    <div class="top-nav">
                        <ul class="navbar-nav mx-auto ml-xl-auto mr-xl-0">
                            <li class="d-none d-md-block">
                                <a href="https://www.smartwaiver.com/w/5a047ecb6be2d/web/" rel="noopener noreferrer" target="_blank" title="Waiver">Waiver</a>
                            </li>
							 <li>
                                <a href="http://morrrange.com/contact-us/#hours" title="Directions">Hours</a>
                            </li>
                            <li>								
                                <a href="http://morrrange.com/contact-us/#location" title="Directions">Directions</a>
                            </li>
                            <li>
                                <a href="tel:+17175177135" title="Phone Number">(717) 517-7135</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-4 text-center nav-logo-wrapper">
                        <a href="/"><img class="img-fluid top-logo tplg" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-main.png" /></a>
                    </div>
                    <div class="col-12 col-md navbar-wrapper">
                        <nav class="navbar navbar-expand-md px-0 pt-4 py-md-5 py-lg-1 px-lg-2">
                            <div id="top-nav" class="collapse navbar-collapse show">
                                <div class="mobile-nav">
	                                <?php
	                                wp_nav_menu( array(
		                                'theme_location'	=> 'main-menu-mobile',
		                                'container'       => false,
		                                'menu_class'		  => '',
		                                'fallback_cb'		  => '__return_false',
		                                'items_wrap'		  => '<ul id="%1$s" class="navbar-nav mx-auto ml-xl-auto mr-xl-0 %2$s">%3$s</ul>',
		                                'depth'			      => 2,
		                                'walker'  	      => new b4st_walker_nav_menu()
	                                ) );
	                                ?>
                                </div>
                                <div class="main-nav">
	                                <?php
	                                wp_nav_menu( array(
		                                'theme_location'	=> 'main-menu',
		                                'container'       => false,
		                                'menu_class'		  => '',
		                                'fallback_cb'		  => '__return_false',
		                                'items_wrap'		  => '<ul id="%1$s" class="navbar-nav mx-auto ml-xl-auto mr-xl-0 %2$s">%3$s</ul>',
		                                'depth'			      => 2,
		                                'walker'  	      => new b4st_walker_nav_menu()
	                                ) );
	                                ?>
                                </div>
                            </div>							
                        </nav>
                        <form role="search" method="get" class="search-form form-inline" action="/">
                            <div class="input-group mx-auto ml-xl-auto mr-xl-4">
                                <button class="input-group-addon search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <input class="search-field form-control" value="" name="s" type="search">
                            </div>						
                        </form>
                    </div>
					
                </div>
            </div>
<a class="btn cta-one text-uppercase d-block d-md-none" href="https://www.smartwaiver.com/w/5a047ecb6be2d/web/">Complete Waiver</a>
			

        </header>
