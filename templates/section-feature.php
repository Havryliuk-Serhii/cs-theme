<?php
/**
 * The template for displaying  section Features.
 */

$feature_posts = new WP_Query(array('post_type'=>'feature_post','posts_per_page'=>4,'order' => 'ASC'));
?>
<!-- Feature section-->
    <div class="feature" id="feature">
        <h2 class="feature-title text-center"><?php the_field('feature_title');?></h2>
	<div class="container">
            <div class="row">
                <?php 
                    
                    if($feature_posts->have_posts()):
                        while ($feature_posts->have_posts()) : $feature_posts->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>"  <?php post_class('card col-md-3 col-12'); ?>>
                        <div class="card-img rounded-circle"><?php the_post_thumbnail();?></div>
                        <h3 class="text-center"><?php the_title();?></h3>
                        <?php the_content();?>
                    </article>
                <?php 
                    endwhile;
                    endif;
                    wp_reset_query();
                ?>		
            </div>
	</div>
    </div>