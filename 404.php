<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>
<div class="error-404 not-found">
    <div class="container">
    	<div class="row">
    		<div class="col-12">
    			<header class="page-header mt-5">
					<h1 class="page-title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cst' ); ?></h1>
				</header><!-- .page-header -->				
    		</div>
    	</div>
    </div>
	
</div><!-- .error-404 -->


<?php
get_footer();
