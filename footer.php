<?php
/**
 * The template for displaying the footer
 */

?>
    </main>
    <!-- Footer section-->
    <footer class="footer">
	<div class="container">
            <div class="row">
		<?php if(!dynamic_sidebar('footer-1')): 
			 dynamic_sidebar( 'footer-1' );
                     endif;
                ?>
		<?php if(!dynamic_sidebar('footer-2')): 
			dynamic_sidebar( 'footer-2' ); 
                     endif; 
                ?>
            </div>
	</div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
