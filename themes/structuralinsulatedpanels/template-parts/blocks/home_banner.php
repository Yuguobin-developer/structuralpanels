<div class="home_banner" style="background-image: url('<?php echo get_field('home_banner')['background_image']; ?>');">
	<div class="row main-content" style="margin: auto;">
		<div class="col-12 title-text">		
			<div class="title_wrap">
				<?php echo get_field('home_banner')['title']; ?> 
			</div>
			<div class="description_wrap">
				<?php echo get_field('home_banner')['text'];  ?>
			</div>
		</div>
	</div>
	<div class="button-next">
		<div class="buttons">
			<?php $buttons = get_field('home_banner')['button_group'];  ?>
			<?php foreach ($buttons as $button): ?>
				<a href="<?php echo $button['buttons']['url'] ?>" style="background-color: <?php echo $button['buttons']['color'] ?>;">
					<?php echo $button['buttons']['button_text'] ?>
				</a>
			<?php endforeach ?>
		</div>
	</div>
</div>

<style type="text/css">

.home_banner {
	color: #fff;
	background-size: cover;
	background-repeat: no-repeat;
	padding: 3rem 0rem;
}

.description_wrap {
	font-size: 1.75rem;
	margin-top: -2rem;
}

.title_wrap {
    font-size: 2.8rem;
}

@media(max-width: 1024px) {
	.title_wrap {
	    font-size: 2.4rem;
	}
	.description_wrap {
			font-size: 1.5rem;
			margin-top: -2rem;
	}
}

.home_banner .button-next {
	display: flex;
	margin: 6rem 0 11rem 0;
}

.home_banner .buttons {
	margin: auto;
}
.home_banner .buttons a:hover {
	background-color: <?php echo $button['buttons']['hover_color'] ?> !important;
}

.home_banner a {
  background-color: #eeee22;
  padding: 18px 35px;
  border-radius: 40px;
  font-weight: 600;
  text-decoration: none;
  text-transform: uppercase;
  margin: 1rem;
  color: white;
}

.description_wrap p {
  line-height: 2.5rem;
}

@media(max-width: 768px) {
	.title_wrap {
	    font-size: 1.8rem;
	}
	.description_wrap {
			font-size: 1.25rem;
			margin-top: -2rem;
	}
	.description_wrap p {
	  line-height: 1.5rem;
	}
	.home_banner a {
		display: block;
	}
	.home_banner .button-next {
		display: flex;
		margin: 2rem 0 0rem 0;
	}
}
</style>

