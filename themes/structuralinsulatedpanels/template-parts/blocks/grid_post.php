<div class="total-blog" style="background-image: url('<?php echo get_field('grid_post')['background_image']; ?>');">
	<div class="title">
		<?php
			echo get_field('grid_post')['title'];
		?>
	</div>
	<div class="description">
		<?php
			echo get_field('grid_post')['description'];
		?>
	</div>
	<div class="container blog-post" style="display: flex; grid-gap: 2.5rem;">
		<div class="right-side" style="width: 50%;">
			<?php
				$posts = get_field('grid_post')['posts_right'];
				$id = $posts->ID;
			    $featured_image = get_the_post_thumbnail($id);

			        // Get the permalink (link) to the post
			        $post_permalink = get_permalink($id);

			?>
		    <a href="<?php echo $post_permalink; ?>">
			    <?php echo $featured_image; ?>

	    	
	    	<div class="article-title"><?php echo $posts->post_title ; ?></div></a>
		</div>
		<div class="left-side" style="width: 50%;">
			<?php
				$posts = get_field('grid_post')['posts_left'];

				foreach ($posts as $post) {

				    $id = $post['post']->ID;

				    $featured_image = get_the_post_thumbnail($id);

			        $post_permalink = get_permalink($id);

	        ?>

        	<a href="<?php echo $post_permalink; ?>">
		    	<div class="overlay"></div>
        		<?php echo $featured_image; ?>
	    		<div class="article-title"><?php echo $post['post']->post_title ; ?></div>	
			</a>
	    	<?php
				}
			?>
		</div>
	</div>
	<div style="display: flex;">
		<a class="view-button" href="<?php echo get_field('grid_post')['button']['url'];?>" style="background-color: <?php echo get_field('grid_post')['button']['color'];?>; ">
			<?php echo get_field('grid_post')['button']['text'];?>
		</a>
		
	</div>
</div>
<style type="text/css">
	.view-button{
	    background-color: #db562e;
	    border-radius: 30px;
	    padding: 16px 34px;
	    text-decoration: none;
	    color: white;
	    font-weight: 600;
	    margin: 4rem auto;
	}
	.view-button:hover {
		color: #e55f06 !important;
		background-color: white !important;
	}
	
	.left-side {
		width: 50%;
	    display: grid;
	    grid-template-columns: repeat(2, 1fr);
	    grid-gap: 2.5rem;
	}
	.right-side {
		width: 50%;	
		height: 816px;
	}
	.right-side img {
		width: 100%;
		height: 100%;
	}
	.left-side img {
		width: 100%;
    	height: 245px;
	}
	.left-side a {
		text-decoration: none;
	}
	.total-blog {
		background-size: cover;
		background-repeat: no-repeat;
	}
	.total-blog .title h1 {
		font-size: 3.5rem;
		color: white;    
		margin: 0;
    	padding-top: 4.5rem;
	}
	.total-blog .description p {
		font-size: 1.2rem;
		color: white;
		padding-bottom: 2rem;
		line-height: 1.75rem;
	}
	.article-title {
	    margin-top: -71px;
	    color: #fff;
	    font-size: 1.3rem;
	    font-weight: 600;
	    margin-left: 25px;
	    text-decoration: none;
	    border: none;
	    padding-right: 10px;
	    max-height: 58px;
	    overflow-y: hidden;
		line-height: 1.75rem;
	}

	@media(max-width: 1024px) {	
		.article-title {
			line-height: 1.75rem;
		}
	}
	.article-title:hover {
		color: #db562e;
	}
	.blog-post {
		padding: 10px;
	}
	@media(max-width: 1024px) {		
		.blog-post {
			display: block !important;
		}	
		.blog-post img {
			margin-top: 10px;
		}
		.right-side {
			width: 100% !important;
		}
		.left-side {
			margin-top: 15px;
			width: 100% !important;
		}

	}

	@media(max-width: 768px) {
		.total-blog .title h1 {
			font-size: 2.5rem;
			color: white;    
			margin: 0;
	    	padding-top: 3.5rem;
		}
		.total-blog .description p {
			font-size: 1.2rem;
			color: white;
			padding-bottom: 0rem;
		}
	}

	@media(max-width: 450px) {		
		.left-side {
			display: block;
			width: 100% !important;
		}
		.left-side img {
			margin-top: 60px;
		}

	}
</style>



