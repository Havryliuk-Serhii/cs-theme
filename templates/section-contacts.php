<?php
/**
 * The template for displaying  section Contacts.
 */
$home = get_page_by_title('Home');
?>
<!-- Contacts section-->

    <div class="contacts" id="contacts" <?php echo cst_contacts_background('contacts_bg');?>>
	<h2 class="contacts-title text-center"><?php the_field('contacts_title');?></h2>
        
	<div class="container">
        <?php 
                if($home):        
                    echo do_shortcode($home->post_content);
                endif;
        ?>    
	</div>				
    </div>