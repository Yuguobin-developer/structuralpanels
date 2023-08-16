<?php
if (is_single('14') && is_active_sidebar('sidebar_product_rockwall')) { ?>

	<?php dynamic_sidebar('sidebar_product_rockwall');?>

<?php
	}
elseif (is_single('16') && is_active_sidebar('sidebar_product_isowall')) { ?>

	<?php dynamic_sidebar('sidebar_product_isowall');?>

<?php
	}
elseif (is_active_sidebar('sidebar-1')) { ?>
	 
			<?php dynamic_sidebar('sidebar-1'); ?>
			 
<?php }