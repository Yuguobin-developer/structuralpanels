<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">

	<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
    <div class="tm-toolbar uk-clearfix uk-hidden-small">

    	<div class="uk-container uk-container-center">

			<?php if ($this['widgets']->count('toolbar-l')) : ?>
            <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('toolbar-r')) : ?>
            <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
            <?php endif; ?>

        </div>

    </div>
    <?php endif; ?>

	<?php if ($this['widgets']->count('headerbar')) : ?>
	<div class="uk-headerbar uk-hidden"><?php echo $this['widgets']->render('headerbar'); ?></div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('logo + menu + search')) : ?>
	<div class="tm-headerbar uk-clearfix">

		<div class="uk-container uk-container-center">

			<?php if ($this['widgets']->count('offcanvas')) : ?>
			<a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
			<?php endif; ?>

			<?php if ($this['widgets']->count('logo-small')) : ?>
			<div class="uk-navbar-content uk-navbar-center uk-visible-small"><a class="tm-logo-small uk-display-inline-block" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
			<?php endif; ?>

			<?php if ($this['widgets']->count('logo + menu + search')) : ?>
			<div class="uk-hidden-small">

				<?php if ($this['widgets']->count('logo')) : ?>
				<div class="tm-logo uk-float-left">
					<a class="uk-display-inline-block uk-hidden-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
				</div>
				<?php endif; ?>

				<?php if ($this['widgets']->count('menu')) : ?>
				<nav class="tm-navbar uk-navbar uk-float-left">
					<?php echo $this['widgets']->render('menu'); ?>
				</nav>
				<?php endif; ?>

				<?php if ($this['widgets']->count('search')) : ?>
				<div class="tm-search uk-float-right uk-visible-xlarge">
					<?php echo $this['widgets']->render('search'); ?>
				</div>
				<?php endif; ?>

			</div>
			<?php endif; ?>

		</div>

	</div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('top-a')) : ?>
	<section class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
		<?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?>
	</section>
	<?php endif; ?>

	<?php if ($this['widgets']->count('top-b')) : ?>
	<div class="tm-block-top-b uk-block">
		<div class="uk-container uk-container-center">
			<section class="<?php echo @$grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
				<?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?>
			</section>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('top-c')) : ?>
	<section class="<?php echo $grid_classes['top-c']; echo $display_classes['top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
		<div class="uk-container uk-container-center">
			<?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
	<div class="tm-middle uk-block">

		<div class="uk-container uk-container-center">

			<div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

				<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
				<div class="<?php echo $columns['main']['class'] ?>">

					<?php if ($this['widgets']->count('main-top-a')) : ?>
					<section class="<?php echo $grid_classes['main-top-a']; echo $display_classes['main-top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top-a', array('layout'=>$this['config']->get('grid.main-top-a.layout'))); ?></section>
					<?php endif; ?>

					<?php if ($this['widgets']->count('main-top-b')) : ?>
					<section class="<?php echo $grid_classes['main-top-b']; echo $display_classes['main-top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top-b', array('layout'=>$this['config']->get('grid.main-top-b.layout'))); ?></section>
					<?php endif; ?>

					<?php if ($this['config']->get('system_output', true)) : ?>
					<main class="tm-content">

						<?php if ($this['widgets']->count('breadcrumbs')) : ?>
						<?php echo $this['widgets']->render('breadcrumbs'); ?>
						<?php endif; ?>

						<?php echo $this['template']->render('content'); ?>

					</main>
					<?php endif; ?>

					<?php if ($this['widgets']->count('main-bottom-a')) : ?>
					<section class="<?php echo $grid_classes['main-bottom-a']; echo $display_classes['main-bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom-a', array('layout'=>$this['config']->get('grid.main-bottom-a.layout'))); ?></section>
					<?php endif; ?>

					<?php if ($this['widgets']->count('main-bottom-b')) : ?>
					<section class="<?php echo $grid_classes['main-bottom-b']; echo $display_classes['main-bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom-b', array('layout'=>$this['config']->get('grid.main-bottom-b.layout'))); ?></section>
					<?php endif; ?>

				</div>
				<?php endif; ?>

	            <?php foreach($columns as $name => &$column) : ?>
	            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
		            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
	            <?php endif ?>
	            <?php endforeach ?>

			</div>

		</div>

	</div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('bottom-a')) : ?>
	<div class="tm-block-bottom-a uk-block">
		<div class="uk-container uk-container-center">
			<div class="background"></div>
			<section class="<?php echo @$grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
				<?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>
			</section>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('bottom-b')) : ?>
	<div class="tm-block-bottom-b uk-block">
		<div class="uk-container uk-container-center">
			<div class="background"></div>
			<section class="<?php echo @$grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
				<?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
			</section>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('bottom-c')) : ?>
	<div class="tm-block-bottom-c uk-block">
		<div class="uk-container uk-container-center">
			<section class="<?php echo @$grid_classes['bottom-c']; echo $display_classes['bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
				<?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?>
			</section>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this['widgets']->count('bottom-d + footer + debug')) : ?>
	<div class="tm-footer-block uk-block uk-contrast">

		<div class="uk-container uk-container-center">

			<?php if ($this['widgets']->count('bottom-d')) : ?>
			<section class="<?php echo $grid_classes['bottom-d']; echo $display_classes['bottom-d']; ?>" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?></section>
			<?php endif; ?>

			<?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
			<footer class="tm-footer">

				<?php if ($this['config']->get('totop_scroller', true)) : ?>
				<a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
				<?php endif; ?>

				<?php
					echo $this['widgets']->render('footer');
					$this->output('warp_branding');
					echo $this['widgets']->render('debug');
				?>

			</footer>
			<?php endif; ?>

			<?php echo $this->render('footer'); ?>

		</div>

	</div>
	<?php endif; ?>

    <?php if ($this['widgets']->count('offcanvas')) : ?>
    <div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
    </div>
    <?php endif; ?>

</body>
</html>
