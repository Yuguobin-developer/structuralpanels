<!-- footer.php -->

<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="footer-columns">
            <div class="footer-column footer-column1">
                <!-- Column 1 content -->
                <h3 class="column-title"><?php echo get_field( 'footer_column1', 'options' )['label'];?></h3>
                <?php echo get_field( 'footer_column1', 'options' )['text'];?>
            </div>
            <div class="footer-column footer-column2">
                <!-- Column 2 content -->
                <h3 class="column-title"><?php echo get_field( 'footer_column2', 'options' )['label'];?></h3>
                <?php 
                foreach (get_field( 'footer_column2', 'options' )['menu'] as $menu) {
                    echo $menu['text'];
                }

                ?>
            </div>
            <div class="footer-column footer-column3">
                <!-- Column 3 content -->
                <h3 class="column-title"><?php echo get_field( 'footer_column3', 'options' )['label'];?></h3>
                <?php 
                foreach (get_field( 'footer_column3', 'options' )['menu'] as $menu) {
                    echo $menu['text'];
                }

                ?>
            </div>
            <div class="footer-column footer-column4">
                <!-- Column 4 content -->
                <h3 class="column-title"><?php echo get_field( 'footer_column4', 'options' )['label'];?></h3>
                <?php 
                foreach (get_field( 'footer_column4', 'options' )['menu'] as $menu) {
                    echo $menu['text'];
                }
                foreach (get_field( 'footer_column4', 'options' )['social'] as $social) { ?>
                    <a href="<?php echo $social['url']?>"><img src="<?php echo $social['image']?>"></a>
                <?php }

                ?>
            </div>
        </div>
        <div class="footer-bottom" style="display: flex;">
            <div style="margin: auto 0"><?php echo get_field( 'footer_bottom', 'options' )['text'];?></div>
            <div class="image-area">
                <?php 
                foreach (get_field( 'footer_bottom', 'options' )['image'] as $img) { ?>
                    <a href="<?php echo $img['url']?>"><img src="<?php echo $img['image']?>"></a>
                <?php }

                ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>