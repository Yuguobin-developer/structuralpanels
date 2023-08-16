<div class="container">
	<div class="column-blog">
		<?php
			$posts = get_field('column_post');

			foreach ($posts as $post) {

			    $id = $post['each_post']->ID;

			    $featured_image = get_the_post_thumbnail($id);

		        $post_permalink = get_permalink($id);

	    ?>

		<div class="each-blog">
			<div>
		    	<a href="<?php echo $post_permalink; ?>">
		    		<?php echo $featured_image; ?>
				</a>
			</div>
	    	<div class="title"><?php echo $post['each_post']->post_title ; ?></div>	
	    	<div class="expert" style="margin-top: 16px;"><?php echo $post['each_post']->post_content ; ?></div>	

			<div class="button-learn">
				<a href="<?php echo $post_permalink; ?>">LEARN MORE</a> 
			</div>
		</div>
		<?php
			}
		?>
	</div>
</div>
<style type="text/css">
	.each-blog .expert {
		max-height: 190px;
    	overflow-y: hidden;
    	line-height: 1.3rem;
	}
	.column-blog {
		margin: 4rem 0 2rem 0;
		width: 100%;
	    display: grid;
	    grid-template-columns: repeat(3, 1fr);
	    grid-gap: 2.5rem;
	}
	.each-blog {
	    padding: 15px;
	}
	.each-blog img {
	    width: 100%;
	    max-height: 360px;
	    overflow-y: hidden;
	}
	.column-blog .title {
		font-size: 1.6rem;
		font-weight: 700;
		text-transform: capitalize;
		padding: 1.6rem 0 0 0;
		color: rgb(236, 91, 43);
	    max-height: 70px;
    	overflow-y: hidden;
    	line-height: 2.25rem;
	}
	.button-learn {
		margin: 2rem 0;
	}
	.button-learn a{
	    text-decoration: none;
	    font-weight: 600;
	    border: solid 2px rgb(236, 91, 43);
	    padding: 10px 20px;
	    border-radius: 30px;
	    color: rgb(236, 91, 43);
	}
	.button-learn a:hover {
		background-color: #ec5b2b !important;
		color: white !important;
	}

	@media(max-width: 1024px) {		
		.column-blog {
		    grid-gap: 0.5rem;
		}
	}

	@media(max-width: 768px) {
		.column-blog {
			display: block;
		}
		.each-blog {
			max-width: 375px;
		    margin: auto;
		    padding: 15px;
		}
	}
</style>



