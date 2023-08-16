<div class="our_client" style="background-image: url('<?php echo get_field('our_clients')['background_image']; ?>');">
	<div class="container">
		<div class="stars" style="display: flex;">
			<?php 
				$stars = get_field('our_clients')['star'];  
				foreach ($stars as $star) { ?>
				<img src="<?php echo $star['image'];  ?>">
			<?php } ?>
		</div>
		<div class="client-text">
			<?php echo get_field('our_clients')['title'];  ?>
		</div>
		<div class="testmonials">
			<?php 
				$testmonials = get_field('our_clients')['testmonial'];  
				foreach ($testmonials as $testmonial) { 
			?>
			<div class="testmonial">
				<div class="text"><?php echo $testmonial['text']; ?></div>
				<div style="display: flex;margin-top: 29px;">
					<img src="<?php echo $testmonial['photo']; ?>">
					<div class="name" style="margin: auto 15px; font-weight: bold; font-weight: 1.2rem"><?php echo $testmonial['name']; ?></div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="button-section">
			<a href="<?php echo get_field('our_clients')['button']['url'];  ?>" style="background-color: <?php echo get_field('our_clients')['button']['color'];  ?>;">
				<?php echo get_field('our_clients')['button']['text'];  ?>
			</a> 
		</div>
	</div>
</div>

<style type="text/css">
	.our_client {
		padding: 15px;
	}
	.our_client .stars {
		justify-content: center;
		padding-top: 5rem;
			padding-bottom: 2rem;
	}
	.our_client .stars img {
		width: 38px;
	    padding: 6px;
	}
	.client-text {
	    margin: -1rem 0 4rem 0;
	}
	.client-text span {
		font-size: 3.2rem;
	}
	.testmonials {
		display: flex;
		grid-column-gap: 50px;
	}
	.testmonial {
		background-color: white;
		padding: 58px 34px 34px;
		box-shadow: 0px 0px 25px -10px;
	}
	.button-section {
		display: flex;
	}
	.button-section a {
	    text-decoration: none;
	    color: white;
	    border-radius: 36px;
	    padding: 18px 40px;
	    margin: 4.5rem auto;
	    font-weight: 600;
	}
	.button-section a:hover {
		color: #e55f06 !important;
		background-color: white !important;
	}
	@media(max-width: 1024px) {
		.testmonials {
			display: block;
    		padding: 15px;
		}
		.testmonial {
			margin-top: 15px;
		}
	}
	@media(max-width: 768px) {
		.testmonials {
			display: block;
    		padding: 15px;
		}
		.testmonial {
			margin-top: 15px;
		}
		.client-text span {
			font-size: 2.2rem;
		}
		.client-text {
			margin: -1rem 0rem 0;
		}
		.button-section a {
			margin: 2.5rem auto;
		}
		.stars {
			padding-bottom: 1rem !important;
		}
	}
</style>

