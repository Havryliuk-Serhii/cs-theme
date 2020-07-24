<?php
/**
 * The template for displaying  section Hero.
 */
?>
<!-- Hero section-->
    <div class="hero" <?php echo cst_hero_background('hero_bg'); ?>>
	<div class="container">
            <div class="row">
		<div class="col-12">
                    <h1 class="hero-title"><?php the_field('hero_title');?></h1>
                    <p class="subtitle"><?php bloginfo('description');?></p>
                    <a href="#feature" class="btn-scroll"><?php esc_html_e('Scroll Down','cst' ); ?><span></span></a>
		</div>
            </div>
	</div>
    </div>