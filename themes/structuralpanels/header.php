<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage Enhenyero
 * @since Enhenyero 1.0
 */
 global $ert_option;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo esc_url( $ert_option['opt_favicon_logo']['url'] ); ?>">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if(get_theme_mod('alert-on') && !is_page_template('landing-page.php') ){ ?>
		<section class="alert-banner">
			<div class="text-center">
				<?php if(get_theme_mod('alert-link')){ ?>
					<a href="<?php echo get_theme_mod('alert-link'); ?>">
						<?php } ?>
						<div class="py-3 container-fluid">
							<?php if(get_theme_mod('fa_icon')){ ?>
								<i class="mr-2 <?php echo get_theme_mod('fa_icon'); ?>"></i>
							<?php } ?>
							<span class="alert-text"><?php echo get_theme_mod('alert-banner'); ?></span>
							<?php if(get_theme_mod('alert-link')){ ?>  
						</div>
					</a>
				<?php } ?>
			</div>
		</section>
	<?php } ?>
	<!-- Top Navigation
    ========================-->
    <nav id="top-menu">
        <div class="container">
            <div class="row">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-sm-6 col-md-6">
                    <div class="navbar-header">
						<?php
						if( IsNullOrEmptyString( $ert_option['opt_site_logo']['url'] ) && $ert_option['opt_logo_select'] == '2' ):
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand image-logo"><img src="<?php echo esc_url( $ert_option['opt_site_logo']['url'] ); ?>" alt=""/></a>
							<?php
						else:
							?>
							<a class="logo navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('title'); ?></a>
							<?php
						endif;
						?>
                    </div>
                </div>

                <div class="col-sm-2 col-md-2">
	                <img src="/wp-content/uploads/2021/04/structural-panels-35-years.jpg" alt="30 Years Structural Panels" id="spi-30-years"/>
                </div>
                <div class="col-sm-4 col-md-4">
                    <ul class="top-links list-unstyled text-right">
						<?php
						if( IsNullOrEmptyString( $ert_option['opt_header_contact_no'] ) && IsNullOrEmptyString( $ert_option['opt_header_email'] ) ) {
							?>
							<li class="top-contact">
								<ol class="list-inline">
									<li><a class="fancybox-inline-x" href="/contact/"><span class="fa fa-envelope-o"></span> Email Us</a></li>
									<li><a class="phone-number-click" href="tel:<?php echo esc_attr(preg_replace('/\D/','',$ert_option['opt_header_contact_no']));?>"><span class="fa fa-phone"></span> <?php echo esc_attr( $ert_option['opt_header_contact_no'] ); ?></a></li>
								</ol>
							</li>
							<?php
						}?>

						<li id="header-cta-section"><a href="#email-us-link" class="fancybox-inline"><img id="header-cta" class="cta-image" src="/wp-content/uploads/2016/04/we-can-do-that-CTA5.png" alt="Structural Panels can build it estimate CTA" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Navigation
    ========================-->
    <div id="sticky-anchor"></div>
    <nav id="main-menu" class="navbar navbar-default">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<div class="responsive-logo">
					<?php
					if( IsNullOrEmptyString( $ert_option['opt_responsive_logo']['url'] ) && $ert_option['opt_res_logo_select'] == '2' ):
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand image-logo"><img src="<?php echo esc_url( $ert_option['opt_responsive_logo']['url'] ); ?>" alt=""/></a>
						<?php
					else:
						?>
						<a class="logo navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('title'); ?></a>
						<?php
					endif;
					?>
				</div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myMenu">
                    <span class="fa fa-list-ul"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myMenu">
                <?php
                // if(!is_user_logged_in()):
				// if( has_nav_menu('primary') ) :
				// 	wp_nav_menu( array(
				// 		'theme_location' => 'primary',
				// 		'container' => false,
				// 		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				// 		'depth' => 10,
				// 		'menu_class' => 'nav navbar-nav',
				// 		'depth' => 10 ,
				// 		'walker' => new ert_nav_walker
				// 	));
				// else :
				// 	echo '<ul class="nav navbar-nav">'
				// 		.wp_list_pages(array(
				// 		'echo'            => 0,
				// 		'walker'          => new ert_wp_page_walker,
				// 		'title_li'        => ''
				// 	)).'</ul>';
				// endif;
				// // else:
				if( has_nav_menu('primary') ) :
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 10,
						'menu_class' => 'nav navbar-nav',
						'depth' => 10 ,
					));
				else :
					echo '<ul class="nav navbar-nav">'
						.wp_list_pages(array(
						'echo'            => 0,
						'title_li'        => ''
					)).'</ul>';
				endif;
				// endif;
				?>
<!--
                <form class="navbar-form navbar-right" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group">
                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
							<input type="submit" class="btn btn-default noradius" value="" id="searchsubmit" /><span class="fa fa-search"></span>
                        </span>
                    </div>
                </form>
-->
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container -->
    </nav>
	<!-- Main Navigation
    ========================-->
	 <!-- Page Header
    ========================-->
	<?php
	$page_header = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_header', true );

	if( $page_header != "disable" && !is_home() && !is_front_page() ) {

		?>
		<div id="en-header">
			<div class="container">
				<?php
				if( is_404() ) {
					?><h1 class="pull-left"><?php _e( 'Error Page', TXT_DOMAIN ); ?></h1><?php
				}
				elseif( is_search() ) {
					?>
					<h1 class="pull-left"><?php printf( __( 'Search Results for: %s', TXT_DOMAIN ), get_search_query() ); ?></h1>
					<?php
				}
				elseif( is_archive() ) {
					the_archive_title( '<h2 class="page-title pull-left">', '</h2>' );
				}
				else {
					?>
					<h1 class="pull-left"><?php the_title(); ?></h1>
					<?php
				}
				?>
				<div class="breadcrumbs breadcrumb pull-right">
						<?php
						if( function_exists( 'bcn_display' ) ) {
							bcn_display();
						}
						?>
				</div>
			</div>
		</div>
		<?php
	} ?>