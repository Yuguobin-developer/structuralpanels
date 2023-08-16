<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.typekit.net/fly3mgc.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="top-header">
      <div class="contact-info">
      	<div style="margin-left: auto;">
          <a href = "mailto: abc@example.com" style="margin-right: 2.5rem;"><i class="fas fa-envelope"></i> EMAIL US</a>
          <a href="tel:905-372-0195"><i class="fas fa-phone"></i> 905-372-0195</a>
        </div>
      </div>
    </div>
    <!-- Site header section -->
    <header id="site-header" class="site-header container">
        <!-- Display the site logo if available -->
        <?php if (has_custom_logo()) : ?>
            <div class="site-logo">
                <?php the_custom_logo(); ?>
            </div>
        <?php else : ?>
            <div class="site-title">
                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <p><?php bloginfo('description'); ?></p>
            </div>
        <?php endif; ?>

        <!-- Display the navigation menu -->
        <?php
        if (has_nav_menu('primary-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'container' => 'nav',
                'container_class' => 'primary-menu',
            ));
        }
        ?>
        
        
        <div class="hamburger-menu">
				  <input id="menu__toggle" type="checkbox" />
				  <label class="menu__btn" for="menu__toggle">
				    <span></span>
				  </label>
				  <?php
		        if (has_nav_menu('primary-menu')) {
		            wp_nav_menu(array(
		                'theme_location' => 'primary-menu',
		                'container' => 'nav',
		                'container_class' => 'primary-menu',
		            ));
		        }
	        ?>
				</div>

    </header>
    <!-- End site header section -->

    <!-- Main content area starts here -->
    <main id="main-content" class="main-content">





<style type="text/css">
  .hamburger-menu	#menu__toggle {
  opacity: 0;
  display: none;
}
.hamburger-menu	#menu__toggle:checked + .menu__btn > span {
  transform: rotate(45deg);
}
.hamburger-menu	#menu__toggle:checked + .menu__btn > span::before {
  top: 0;
  transform: rotate(0deg);
}
.hamburger-menu	#menu__toggle:checked + .menu__btn > span::after {
  top: 0;
  transform: rotate(90deg);
}
.hamburger-menu	#menu__toggle:checked ~ .primary-menu {
  left: 0 !important;
}
.hamburger-menu	.menu__btn {
  position: absolute;
  top: 20px;
  right: 20px;
  top: 83px;
  width: 26px;
  height: 26px;
  cursor: pointer;
  z-index: 1;
}
.admin-bar .hamburger-menu	.menu__btn {
	top: 130px;
}
.hamburger-menu	.menu__btn > span,
.hamburger-menu	.menu__btn > span::before,
.hamburger-menu	.menu__btn > span::after {
  display: block;
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: #616161;
  transition-duration: .25s;
}
.hamburger-menu	.menu__btn > span::before {
  content: '';
  top: -8px;
}
.hamburger-menu	.menu__btn > span::after {
  content: '';
  top: 8px;
}
.hamburger-menu	.primary-menu {
  display: block;
  position: fixed;
  top: 0;
  left: -100%;
  width: 300px;
  height: 100%;
  margin: 0;
  padding: 80px 0;
  list-style: none;
  background-color: #ECEFF1;
  box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
  transition-duration: .25s;
}
.hamburger-menu	.menu__item {
  display: block;
  padding: 12px 24px;
  color: #333;
  font-family: 'Roboto', sans-serif;
  font-size: 20px;
  font-weight: 600;
  text-decoration: none;
  transition-duration: .25s;
}
.hamburger-menu	.menu__item:hover {
  background-color: #CFD8DC;
}
  </style>